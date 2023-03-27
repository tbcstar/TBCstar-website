<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NavCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            "items" => [ [
                "menu" => [
                "location" => "primary",
                  "items" => [ [
                                "label" => "API Access",
                    "url" => "/access/clients"
                  ], [
                                "label" => "Documentation",
                    "url" => "/documentation"
                  ], [
                                "label" => "Forums",
                    "url" => "https://us.forums.blizzard.com/en/blizzard/c/api-discussion"
                  ] ]
                ]
              ], [
            "menu" => [
                    "location" => "secondary",
                    "items" => [ ]
                    ]
            ],
                [
                    "menu" => [
                        "location" => "user",
                        "items" => [ [
                                "label" => "My Account",
                    "type" => "user",
                    "menu" => [
                                    "items" => [ [
                                        "label" => "Log In",
                        "type" => "login"
                      ], [
                                        "label" => "Account Settings",
                        "url" => "https://account.battle.net"
                      ], [
                                        "label" => "Create a Free Account",
                        "url" => "https://account.battle.net/creation/"
                      ] ]
                    ]
                    ] ]
                    ]
                ]
            ]
        ];
    }
}
