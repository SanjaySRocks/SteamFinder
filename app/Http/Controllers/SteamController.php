<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SteamID;
use Steam as Steam2;

use Illuminate\Support\Facades\App;

class SteamController extends Controller
{
    public function search(Request $request)
    {
        $apikey = env('STEAM_API_KEY');
        $id = $request->steamid;

        $replace_text = array(
            'https://',
            'http://',
            'steamcommunity.com/id/',
            'steamcommunity.com/profiles/',
            '/',
            '\\',
            ' '
        );

        foreach ($replace_text as $replace) {
            $id = str_ireplace($replace, "", $id);
        }

        $szID = $this->VanityURL($id);
        if($szID == null)
        {
            try
            {
                $s = new SteamID($id);

                if($s->isValid())
                {
                    $tempid = $s->ConvertToUInt64();
                    return redirect('/'.$tempid)->with('status', 'Profile Found!');
                }
            }
            catch(\InvalidArgumentException $e )
            {
                echo 'Given SteamID could not be parsed.';
                return redirect()->back()->with('error', 'Failed to get data please check id!');
            }  
            return redirect()->back()->with('error', 'Failed to get data please check id!');
        }
        else
        {
            return redirect('/'.$szID)->with('status', 'Profile Found!');
        }    
    }

    public function VanityURL($username)
    {
        $apikey = env('STEAM_API_KEY');
        $user = Http::get('http://api.steampowered.com/ISteamUser/ResolveVanityURL/v0001/?key='.$apikey."&vanityurl=".$username)->json();
        $collection = collect($user);

        if($collection['response']['success'])
        {
            switch((int) $collection['response']['success'])
            {
                case 1: return $collection['response']['steamid'];
                case 42: return null;
            }
        }
    }


    public function show($id)
    {
        $s = new SteamID($id);
        if(!$s->IsValid())
            return redirect('/')->with('error', 'Failed to get data please check id!');

        $apikey = env('STEAM_API_KEY');
        $data = Http::get('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key='.$apikey.'&steamids='.$id)->json();
        $collection=collect($data);

        if(empty($collection['response']['players'][0]))
            return redirect('/')->with('error', 'Failed to get data please check id!');

        $id64temp = $collection['response']['players'][0]['steamid'];

        try
        {
            $s = new SteamID($id64temp);
        }
        catch(\InvalidArgumentException $e )
        {
            echo 'Given SteamID could not be parsed.';
        }
        
        $data['si64'] = $collection['response']['players'][0]['steamid'];
        $data['cvs'] = !empty($collection['response']['players'][0]['communityvisibilitystate']) ? $collection['response']['players'][0]['communityvisibilitystate'] : "";

        $data['prs'] = !empty($collection['response']['players'][0]['profilestate']) ? $collection['response']['players'][0]['profilestate'] : "";

        $data['pn'] = !empty($collection['response']['players'][0]['personaname']) ? $collection['response']['players'][0]['personaname'] : "";

        $data['purl'] = $collection['response']['players'][0]['profileurl'];
        $data['av'] = $collection['response']['players'][0]['avatar'];
        $data['avm'] = $collection['response']['players'][0]['avatarmedium'];
        $data['avf'] = $collection['response']['players'][0]['avatarfull'];
        $data['avhash'] = $collection['response']['players'][0]['avatarhash'];
        $data['ps'] = !empty($collection['response']['players'][0]['personastate']) ? $collection['response']['players'][0]['personastate'] : "";

        
        $data['rn'] = !empty($collection['response']['players'][0]['realname']) ? $collection['response']['players'][0]['realname'] : "";
        
        $data['pcid'] = !empty($collection['response']['players'][0]['primaryclanid']) ? $collection['response']['players'][0]['primaryclanid'] : "";
        $data['createdat'] = !empty($collection['response']['players'][0]['timecreated']) ? $collection['response']['players'][0]['timecreated'] : "";
        $data['psf'] = !empty($collection['response']['players'][0]['personastateflags']) ? $collection['response']['players'][0]['personastateflags'] : "";

        $data['steam3'] = $s->RenderSteam3();
        $data['steam32'] = $s->RenderSteam2();
        $data['account_id'] = $s->GetAccountID();
        $data['invite_url'] = $s->RenderSteamInvite();
        $data['profile2'] = 'http://steamcommunity.com/profiles/'.$data['si64'].'/';

        $pbans = Steam2::user($id64temp)->GetPlayerBans()[0];
        $bans['cb'] = $pbans->CommunityBanned;
        $bans['vb'] = $pbans->VACBanned;
        $bans['novb'] = $pbans->NumberOfVACBans;
        $bans['dslb'] = $pbans->DaysSinceLastBan;
        $bans['nogb'] = $pbans->NumberOfGameBans;
        $bans['eb'] = $pbans->EconomyBan;

        $hours = Steam2::player($id64temp)->GetOwnedGames();

        if(count($hours) > 0){
            foreach ($hours as $h) {
                if($h->appId == 730)
                {
                    $hours['csgo'] = $h;
                    break;
                }
            }
        }
        return view('steaminfo', compact('data','bans', 'hours'));
    }
}
