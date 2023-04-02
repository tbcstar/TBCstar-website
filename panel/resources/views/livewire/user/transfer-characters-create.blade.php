<div data-v-0a034e2c="" class="overview-card col-12">
    <div data-v-15d61d2e="" data-v-7c3c8cd5="" data-v-34b77a92="" class="card mt-card-top personal-info">

        <div data-v-15d61d2e="" class="card-title">
                <div data-v-15d61d2e="" class="row">
                    <div data-v-15d61d2e="" class="col-12 col-md-6">
                        <h3 data-v-15d61d2e="" class="text-uppercase">申请</h3>
                    </div>
                </div>
            </div>
        <div data-v-15d61d2e="" class="card-body">
            <div data-v-112a4620="" data-v-15d61d2e="">
                <div data-v-112a4620="" data-v-15d61d2e="" id="placeholder-15">

                    <div  data-v-7c3c8cd5="" data-v-15d61d2e="" class="edit-info">
                        <form wire:submit.prevent="saveValidate" data-v-112a4620="" data-v-15d61d2e="">

                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    登录/密码
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                                    <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="登录"
                                           data-vv-as="Login" wire:model="login" aria-required="true"
                                           aria-invalid="false" class="input-block">
                                    @error('login')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                                    <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="密码"
                                           data-vv-as="Password" wire:model="password" aria-required="true"
                                           aria-invalid="false" class="input-block">
                                    @error('password')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                    角色名称
                                </div>
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                    <input data-v-112a4620="" data-v-15d61d2e="" type="text" placeholder="角色名称"
                                           class="input-block" wire:model="nameOld">
                                    @error('nameOld')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    服务器
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="server" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">服务器</option>
                                        <option value="Wowcircle x1">Wowcircle x1</option>
                                        <option value="Wowcircle x5">Wowcircle x5</option>
                                        <option value="Wowcircle x100">Wowcircle x100</option>
                                        <option value="Sirus x2">Sirus x2</option>
                                        <option value="Sirus x4">Sirus x4</option>
                                        <option value="Sirus x10">Sirus x10</option>
                                        <option value="Uwow x30">Uwow x30</option>
                                        <option value="Ezwow x2-x8">Ezwow x2-x8</option>
                                        <option value="Warmane 3.3.5">Warmane 3.3.5</option>
                                    </select>
                                    @error('server')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @if($server)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    阵营
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="faction" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">阵营</option>
                                        <option value="联盟">联盟</option>
                                        <option value="部落">部落</option>
                                    </select>
                                    @error('faction')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($faction)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    角色性别
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="gender" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">角色性别</option>
                                        <option value="男性">男性</option>
                                        <option value="女性">女性</option>
                                    </select>
                                    @error('gender')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($faction)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    种族
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="rasa" data-v-7c3c8cd5="" class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">种族</option>
                                        @if($faction === '联盟')
                                            <option value="人类">人类</option>
                                            <option value="矮人">矮人</option>
                                            <option value="暗夜精灵">暗夜精灵</option>
                                            <option value="侏儒">侏儒</option>
                                            <option value="德莱尼">德莱尼</option>
                                            <option value="狼人">狼人</option>
                                            <option value="熊猫人">熊猫人</option>
                                            <option value="虚空精灵">虚空精灵</option>
                                            <option value="恶魔猎手">恶魔猎手</option>
                                        @endif
                                        @if($faction === '部落')
                                            <option value="">种族</option>
                                            <option value="兽人">兽人</option>
                                            <option value="亡灵">亡灵</option>
                                            <option value="牛头人">牛头人</option>
                                            <option value="巨魔">巨魔</option>
                                            <option value="血精灵">血精灵</option>
                                            <option value="地精">地精</option>
                                            <option value="夜之子">夜之子</option>
                                            <option value="狐人">狐人</option>
                                            <option value="恶魔猎手">恶魔猎手</option>
                                        @endif
                                    </select>
                                    @error('rasa')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($rasa)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    职业
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="class" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">职业</option>
                                        <option value="战士">战士</option>
                                        <option value="圣骑士">圣骑士</option>
                                        <option value="猎人">猎人</option>
                                        <option value="盗贼">盗贼</option>
                                        <option value="牧师">牧师</option>
                                        <option value="萨满祭司">萨满祭司</option>
                                        <option value="法师">法师</option>
                                        <option value="术士">术士</option>
                                        <option value="德鲁伊">德鲁伊</option>
                                        <option value="死亡骑士">死亡骑士</option>
                                    </select>
                                    @error('class')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($class)
                            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                                    天赋
                                </div>
                                <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                                    <select data-v-8dca2dd6="" wire:model="specializacia" data-v-7c3c8cd5=""
                                            class="grid-100 input-block" data-v-15d61d2e="">
                                        <option value="">天赋</option>
                                        @if($class === "战士")
                                        <option value="武器">武器</option>
                                        <option value="狂暴">狂暴</option>
                                        <option value="防护">防护</option>
                                        @endif
                                        @if($class === "圣骑士")
                                        <option value="神圣">神圣</option>
                                        <option value="防护">防护</option>
                                        <option value="惩戒">惩戒</option>
                                        @endif
                                        @if($class === "猎人")
                                            <option value="兽王">兽王</option>
                                            <option value="射击">射击</option>
                                            <option value="生存">生存</option>
                                        @endif
                                        @if($class === "盗贼")
                                            <option value="刺杀">刺杀</option>
                                            <option value="战斗">战斗</option>
                                            <option value="敏锐">敏锐</option>
                                        @endif
                                        @if($class === "牧师")
                                            <option value="戒律">戒律</option>
                                            <option value="神圣">神圣</option>
                                            <option value="暗影">暗影</option>
                                        @endif
                                        @if($class === "萨满祭司")
                                            <option value="元素">元素</option>
                                            <option value="增强">增强</option>
                                            <option value="恢复">恢复</option>
                                        @endif
                                        @if($class === "法师")
                                            <option value="奥术">奥术</option>
                                            <option value="火焰">火焰</option>
                                            <option value="冰霜">冰霜</option>
                                        @endif
                                        @if($class === "术士")
                                            <option value="痛苦">痛苦</option>
                                            <option value="恶魔学识">恶魔学识</option>
                                            <option value="毁灭">毁灭</option>
                                        @endif
                                        @if($class === "德鲁伊")
                                            <option value="平衡">平衡</option>
                                            <option value="野性战斗">野性战斗</option>
                                            <option value="恢复">恢复</option>
                                        @endif
                                        @if($class === "死亡骑士")
                                            <option value="鲜血">鲜血</option>
                                            <option value="冰霜">冰霜</option>
                                            <option value="邪恶">邪恶</option>
                                        @endif
                                    </select>
                                    @error('specializacia')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            @if($specializacia)
                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-3 col-xl-2 label email-label">
                                    角色名称
                                </div>
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col-sm-12 col-md-6 col-xl-5 col-lg-7">
                                    <input data-v-112a4620="" data-v-15d61d2e="" type="text"
                                           placeholder="在我们的服务器上输入所需的角色名称" class="input-block"
                                           wire:model="name">
                                    @error('name')<span data-v-112a4620="" data-v-15d61d2e="" class="is-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            @endif
                            <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
                                <div data-v-112a4620="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                                    <button wire:click="save" wire:loading.attr="disabled" type="submit"
                                            data-v-312dd04b=""
                                            data-v-112a4620=""
                                            data-v-15d61d2e="" class="btn-primary btn">
                                        提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
