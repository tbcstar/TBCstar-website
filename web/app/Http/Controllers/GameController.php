<?php

namespace App\Http\Controllers;

use App\Models\Game\Arena;
use App\Models\Game\ArenaNew;
use App\Models\Instance\MythicFinishGroups;
use App\Services\Server;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function start () {
        return view('game.start');
    }

    public function return () {
        return view('game.return');
    }

    public function recruit () {
        return view('game.recruit_friend');
    }

    public function status () {
        return view('game.status');
    }

    public function graphql(Request $request) {
        if ($request->get('operationName')) {
            if ($request->get('operationName') === 'GetNow') {
                return Server::status();
            } else {
                if($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'eu') {
                    return Server::status();
                } elseif ($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'sl-eu') {
                    return Server::statusSL();
                }  elseif($request->get('variables')['input']['compoundRegionGameVersionSlug'] === 'wotlk-eu') {
                    return Server::statusWotlk();
                }
            }
        } else {
            return json_encode(
                ["errors"=>[["message"=>"PersistedQueryNotSupported"]]]
            );
        }
        return json_encode(
            ["errors"=>[["message"=>"PersistedQueryNotSupported"]]]
        );
    }

    public function leaderboards($server, $instance) {
        $data = MythicFinishGroups::where('map', config('instance.mythic.'.$instance.'.id'))
            ->orderBy('level', 'desc')
            ->orderBy('time')
            ->simplePaginate(10);

        $instanceName = config('instance.mythic.'.$instance.'.name');
        return view('game.leaderboards.index', compact('data', 'instanceName', 'server'));
    }

    public function arena ($server, $type) {
        if(Server::IsRealmBySlug($server) === false) {
            return abort(404);
        }
        if ($server === 'stormrage-x7') {
            if($type === '2v2') {
                $data = Arena::with('team_member')->where('type', 2)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } elseif ($type === '3v3') {
                $data = Arena::with('team_member')->where('type', 3)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } else {
                $data = Arena::with('team_member')->where('type', 5)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            }

        } else {
            if($type === '2v2') {
                $data = ArenaNew::with('team_member')->where('type', 2)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } elseif ($type === '3v3') {
                $data = ArenaNew::with('team_member')->where('type', 3)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            } else {
                $data = ArenaNew::with('team_member')->where('type', 5)->where('rating', '>', 0)->orderBy('rating', 'desc')->paginate(30);
            }
        }

        return view('game.pvp.arena', [
            'data' => $data,
            'servers' => $server,
            'type' => $type,
            'server_type' => Server::IsRealmByType($server)
        ]);
    }

    public function team ($server, $type, $team) {
        if(Server::IsRealmBySlug($server) === false) {
            return abort(404);
        }

        $data = Arena::with('members')
            ->where('name', $team)
            ->firstOrFail();

        return view('game.pvp.team', [
            'data' => $data,
            'servers' => $server,
            'type' => $type,
            'team' => $team,
            'server_type' => Server::IsRealmByType($server)
        ]);
    }

}
