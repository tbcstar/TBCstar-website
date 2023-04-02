<div>
    <div data-v-0a034e2c="" class="row">
        <div data-v-0a034e2c="" class="overview-card col-12">
            <div data-v-15d61d2e="" data-v-7090ae16="" data-v-0a034e2c="" class="card account-overview-code">
                <div data-v-15d61d2e="" class="card-title">
                    <div data-v-7090ae16="" data-v-15d61d2e="">
                        <h3 data-v-7090ae16="" data-v-15d61d2e="">
                            标准 
                        </h3>
                    </div>
                </div>
                <div data-v-15d61d2e="" class="card-body">
                    <div data-v-7090ae16="" data-v-15d61d2e="" id="redeem-code-form">
                        <div data-v-21c799d2="" data-v-15d61d2e="" class="row">
                            <ul>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">复制的角色不会在其他服务器上删除。角色的最低级产品等需求为226级，对于Wowcircle x5和Wowcircle x100服务器的角度，需要为232级物品等。</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">复制不包含交通工具，但在我们的服务器上，角色将获得飞行和地面坐骑。</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">在复制过程中，角色的金币会被转移，最大转移金为10000金币。</li> </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">在我们的服务器上，角色会自动获得最高的骑术能力，即使在复制的服务器上未学习此技能。</li> </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">每个玩家只能免费进行一次复制，再复制将需要支付79个奖励点。</li>
                            </div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">在复制过程中，形成就、专业和药品不会被考疑在里面。</li></div><hr>
                            <div data-v-21c799d2="" data-v-15d61d2e="" class="label col-12 col-md-12"><li class="label">在复制过程中，角色的装备不会被考虑到在内，我们将提供180级物件等级别的装备，针对角色选择的一个专业。</li></div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-0a034e2c="" class="row">
        @empty($list)
            <livewire:user.transfer-characters-create />
        @else
            <livewire:user.transfer-characters-list />
        @endempty
    </div>
</div>
