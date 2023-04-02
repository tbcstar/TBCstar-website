<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="form">

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                名称
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" id="first-name" wire:model.defer="state.first_name" placeholder="名称" data-vv-as="名称" aria-required="true" aria-invalid="false" class="input-block">
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="姓氏" data-vv-as="姓氏" id="last-name" wire:model.defer="state.last_name" aria-required="true" aria-invalid="false" class="input-block">
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>
        </div>

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                生日
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" id="day" wire:model.defer="state.day"
                       placeholder="День" data-vv-as="День" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->day) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="day" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Месяц" data-vv-as="Месяц"
                       id="month" wire:model.defer="state.month" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->month) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="month" class="mt-2" />
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-3 col-lg-4 mt-3 mt-lg-0">
                <input data-v-7c3c8cd5="" data-v-15d61d2e="" type="text" placeholder="Год" data-vv-as="Год"
                       id="year" wire:model.defer="state.year" aria-required="true" aria-invalid="false"
                       class="input-block" @if(auth()->user()->info->year) disabled @endif>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="is-error" style="display: none;"></span>
                <x-jet-input-error for="year" class="mt-2" />
            </div>
        </div>

        <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-md-3 col-xl-2 label">
                国家/地区
            </div>
            <div data-v-7c3c8cd5="" data-v-15d61d2e="" class="col-12 col-xl-6 col-lg-8">
                <select data-v-8dca2dd6="" wire:model.defer="state.country" data-v-7c3c8cd5="" id="country" title=""
                        class="grid-100 input-block" data-v-15d61d2e="" @if(auth()->user()->info->country) disabled @endif>
                    <option value="">国家</option>
                    <option value="AUS">澳大利亚</option>
                    <option value="AUT">奥地利</option>
                    <option value="AZE">阿塞拜疆</option>
                    <option value="ALA">奥兰群岛</option>
                    <option value="ALB">阿尔巴尼亚</option>
                    <option value="DZA">阿尔及利亚</option>
                    <option value="ASM">美属萨摩亚</option>
                    <option value="AIA">安圭拉</option>
                    <option value="AGO">安哥拉</option>
                    <option value="AND">安道尔</option>
                    <option value="ATA">南极洲</option>
                    <option value="ATG">安提瓜和巴布达</option>
                    <option value="ARG">阿根廷</option>
                    <option value="ARM">亚美尼亚</option>
                    <option value="ABW">阿鲁巴</option>
                    <option value="AFG">阿富汗</option>
                    <option value="BHS">巴哈马</option>
                    <option value="BGD">孟加拉国</option>
                    <option value="BRB">巴巴多斯</option>
                    <option value="BHR">巴林</option>
                    <option value="BLZ">伯利兹</option>
                    <option value="BEL">比利时</option>
                    <option value="BEN">贝宁</option>
                    <option value="BMU">百慕大</option>
                    <option value="BGR">保加利亚</option>
                    <option value="BOL">玻利维亚</option>
                    <option value="BIH">波斯尼亚和黑塞哥维那</option>
                    <option value="BWA">博茨瓦纳</option>
                    <option value="BRA">巴西</option>
                    <option value="IOT">英属印度洋领地</option>
                    <option value="BRN">文莱</option>
                    <option value="BFA">布基纳法索</option>
                    <option value="BDI">布隆迪</option>
                    <option value="BTN">不丹</option>
                    <option value="MKD">前南斯拉夫马其顿共和国</option>
                    <option value="VUT">瓦努阿图</option>
                    <option value="GBR">英国</option>
                    <option value="HUN">匈牙利</option>
                    <option value="VEN">委内瑞拉</option>
                    <option value="VGB">英属维京群岛</option>
                    <option value="VIR">美属维京群岛</option>
                    <option value="UMI">美国外属小岛</option>
                    <option value="TLS">东帝汶</option>
                    <option value="VNM">越南</option>
                    <option value="GAB">加蓬</option>
                    <option value="HTI">海地</option>
                    <option value="GUY">圭亚那</option>
                    <option value="GMB">冈比亚</option>
                    <option value="GHA">加纳</option>
                    <option value="GLP">瓜德罗普</option>
                    <option value="GTM">危地马拉</option>
                    <option value="GIN">几内亚</option>
                    <option value="GNB">几内亚比绍</option>
                    <option value="DEU">德国</option>
                    <option value="GGY">根西岛</option>
                    <option value="GIB">直布罗陀</option>
                    <option value="HND">洪都拉斯</option>
                    <option value="HKG">香港特别行政区</option>
                    <option value="GRD">格林纳达</option>
                    <option value="GRL">格陵兰岛</option>
                    <option value="GRC">希腊</option>
                    <option value="GEO">格鲁吉亚</option>
                    <option value="DNK">丹麦</option>
                    <option value="COD">刚果民主共和国</option>
                    <option value="STP">圣多美和普林西比民主共和国</option>
                    <option value="JEY">泽西岛</option>
                    <option value="DJI">吉布提</option>
                    <option value="DMA">多米尼克</option>
                    <option value="DOM">多明尼加共和国</option>
                    <option value="EGY">埃及</option>
                    <option value="ZMB">赞比亚</option>
                    <option value="ESH">西撒哈拉</option>
                    <option value="ZWE">津巴布韦</option>
                    <option value="ISR">以色列</option>
                    <option value="IND">印度</option>
                    <option value="IDN">印度尼西亚</option>
                    <option value="JOR">约旦</option>
                    <option value="IRQ">伊拉克</option>
                    <option value="IRL">爱尔兰</option>
                    <option value="IRN">伊朗伊斯兰共和国</option>
                    <option value="ISL">冰岛</option>
                    <option value="ESP">西班牙</option>
                    <option value="ITA">意大利</option>
                    <option value="YEM">也门</option>
                    <option value="CPV">佛得角</option>
                    <option value="KAZ">哈萨克斯坦</option>
                    <option value="CYM">开曼群岛</option>
                    <option value="KHM">柬埔寨</option>
                    <option value="CMR">喀麦隆</option>
                    <option value="CAN">加拿大</option>
                    <option value="QAT">卡塔尔</option>
                    <option value="KEN">肯尼亚</option>
                    <option value="CYP">塞浦路斯</option>
                    <option value="KGZ">吉尔吉斯斯坦</option>
                    <option value="KIR">基里巴斯</option>
                    <option value="CHN">中国</option>
                    <option value="COL">哥伦比亚</option>
                    <option value="COM">科摩罗群岛</option>
                    <option value="COG">刚果</option>
                    <option value="CRI">哥斯达黎加</option>
                    <option value="CIV">科特迪瓦</option>
                    <option value="CUB">古巴</option>
                    <option value="KWT">科威特</option>
                    <option value="LAO">老挝人民民主共和国</option>
                    <option value="LVA">拉脱维亚</option>
                    <option value="LSO">莱索托</option>
                    <option value="LBR">利比里亚</option>
                    <option value="LBN">黎巴嫩</option>
                    <option value="LBY">利比亚阿拉伯民众国</option>
                    <option value="LTU">立陶宛</option>
                    <option value="LIE">列支敦士登</option>
                    <option value="LUX">卢森堡</option>
                    <option value="MUS">毛里求斯</option>
                    <option value="MRT">毛里塔尼亚</option>
                    <option value="MDG">马达加斯加</option>
                    <option value="MAC">澳门</option>
                    <option value="MWI">马拉维</option>
                    <option value="MYS">马来西亚</option>
                    <option value="MLI">马里</option>
                    <option value="MLT">马耳他</option>
                    <option value="MAR">摩洛哥</option>
                    <option value="MTQ">马提尼克</option>
                    <option value="MHL">马绍尔群岛</option>
                    <option value="MEX">墨西哥</option>
                    <option value="MOZ">莫桑比克</option>
                    <option value="MCO">摩纳哥</option>
                    <option value="MNG">蒙古</option>
                    <option value="MSR">蒙特塞拉特</option>
                    <option value="MMR">缅甸</option>
                    <option value="NAM">纳米比亚</option>
                    <option value="NRU">瑙鲁</option>
                    <option value="NPL">尼泊尔</option>
                    <option value="NER">尼日尔</option>
                    <option value="NGA">尼日利亚</option>
                    <option value="ANT">荷属安的列斯群岛</option>
                    <option value="NLD">荷兰</option>
                    <option value="NIC">尼加拉瓜</option>
                    <option value="NIU">纽埃</option>
                    <option value="NZL">新西兰</option>
                    <option value="NCL">新喀里多尼亚</option>
                    <option value="NOR">挪威</option>
                    <option value="TZA">坦桑尼亚联合共和国</option>
                    <option value="ARE">阿拉伯联合酋长国</option>
                    <option value="COK">库克群岛</option>
                    <option value="TCA">特克斯和凯科斯群岛</option>
                    <option value="FJI">斐济</option>
                    <option value="BVT">布韦岛</option>
                    <option value="GUM">关岛</option>
                    <option value="NFK">诺福克岛</option>
                    <option value="OMN">阿曼</option>
                    <option value="SJM">斯瓦尔巴特和扬马延岛</option>
                    <option value="WLF">瓦利斯和富图纳群岛</option>
                    <option value="CCK">科科斯（基林）群岛</option>
                    <option value="MYT">马约特岛</option>
                    <option value="IMN">马恩岛</option>
                    <option value="CXR">圣诞岛</option>
                    <option value="BLM">圣巴泰勒米岛</option>
                    <option value="SHN">圣赫勒拿岛</option>
                    <option value="MAF">法属圣马丁岛</option>
                    <option value="HMD">赫德岛和麦克唐纳岛</option>
                    <option value="PAK">巴基斯坦</option>
                    <option value="PLW">帕劳</option>
                    <option value="PSE">巴勒斯坦</option>
                    <option value="PAN">巴拿马</option>
                    <option value="PNG">巴布亚新几内亚</option>
                    <option value="PRY">巴拉圭</option>
                    <option value="PER">秘鲁</option>
                    <option value="PCN">皮特凯恩岛</option>
                    <option value="POL">波兰</option>
                    <option value="PRT">葡萄牙</option>
                    <option value="PRI">波多黎各</option>
                    <option value="BLR">白俄罗斯</option>
                    <option value="KOR">韩国</option>
                    <option value="MDV">马尔代夫</option>
                    <option value="MDA">摩尔多瓦</option>
                    <option value="REU">留尼汪岛</option>
                    <option value="RUS">俄罗斯联邦</option>
                    <option value="RWA">卢旺达</option>
                    <option value="ROU">罗马尼亚</option>
                    <option value="SLV">萨尔瓦多</option>
                    <option value="WSM">萨摩亚</option>
                    <option value="SMR">圣马力诺</option>
                    <option value="SAU">沙特阿拉伯</option>
                    <option value="SWZ">斯威士兰</option>
                    <option value="VAT">梵蒂冈</option>
                    <option value="MNP">北马里亚纳群岛</option>
                    <option value="SYC">塞舌尔</option>
                    <option value="SEN">塞内加尔</option>
                    <option value="SPM">圣皮埃尔和密克隆群岛</option>
                    <option value="VCT">圣文森特和格林纳丁斯</option>
                    <option value="KNA">圣基茨和尼维斯</option>
                    <option value="LCA">圣卢西亚</option>
                    <option value="SRB">塞尔维亚</option>
                    <option value="SGP">新加坡</option>
                    <option value="SVK">斯洛伐克</option>
                    <option value="SVN">斯洛文尼亚</option>
                    <option value="SLB">所罗门群岛</option>
                    <option value="SOM">索马里</option>
                    <option value="SDN">苏丹</option>
                    <option value="SUR">苏里南</option>
                    <option value="USA">美国</option>
                    <option value="SLE">塞拉利昂</option>
                    <option value="TJK">塔吉克斯坦</option>
                    <option value="THA">泰国</option>
                    <option value="TWN">台湾</option>
                    <option value="TGO">多哥</option>
                    <option value="TKL">托克劳</option>
                    <option value="TON">汤加</option>
                    <option value="TTO">特立尼达和多巴哥</option>
                    <option value="TUV">图瓦卢</option>
                    <option value="TUN">突尼斯</option>
                    <option value="TKM">土库曼斯坦</option>
                    <option value="TUR">土耳其</option>
                    <option value="UGA">乌干达</option>
                    <option value="UZB">乌兹别克斯坦</option>
                    <option value="UKR">乌克兰</option>
                    <option value="URY">乌拉圭</option>
                    <option value="FRO">法罗群岛</option>
                    <option value="FSM">密克罗尼西亚联邦</option>
                    <option value="PHL">菲律宾</option>
                    <option value="FIN">芬兰</option>
                    <option value="FLK">福克兰群岛（马尔维纳斯群岛）</option>
                    <option value="FRA">法国</option>
                    <option value="GUF">法属圭亚那</option>
                    <option value="PYF">法属波利尼西亚</option>
                    <option value="ATF">法属南部领地</option>
                    <option value="HRV">克罗地亚</option>
                    <option value="CAF">中非共和国</option>
                    <option value="TCD">乍得</option>
                    <option value="MNE">黑山</option>
                    <option value="CZE">捷克共和国</option>
                    <option value="CHL">智利</option>
                    <option value="CHE">瑞士</option>
                    <option value="SWE">瑞典</option>
                    <option value="LKA">斯里兰卡</option>
                    <option value="ECU">厄瓜多尔</option>
                    <option value="GNQ">赤道几内亚</option>
                    <option value="ERI">厄立特里亚</option>
                    <option value="EST">爱沙尼亚</option>
                    <option value="ETH">埃塞俄比亚</option>
                    <option value="SGS">南乔治亚岛和南桑威奇群岛</option>
                    <option value="ZAF">南非</option>
                    <option value="JAM">牙买加</option>
                    <option value="JPN">日本</option>
                </select>
                <span data-v-7c3c8cd5="" data-v-15d61d2e="" class="help-block"></span>
            </div>
        </div>
    </x-slot>

    <x-slot name="actions">
        <div data-v-112a4620="" data-v-15d61d2e="" class="row mt-3">
            <div data-v-112a4620="" data-v-15d61d2e="" class="col offset-md-3 offset-lg-3 offset-xl-2">
                <button wire:loading.attr="disabled" wire:target="photo" type="submit" data-v-312dd04b=""
                        data-v-112a4620="" data-v-15d61d2e="" class="btn-primary btn">
                    保存
                </button>
                <button x-on:click="isEditing = false" type="button" data-v-312dd04b=""
                        data-v-112a4620="" data-v-15d61d2e="" class="btn-secondary btn">
                    取消
                </button>
                <x-jet-action-message data-v-312dd04b="" data-v-112a4620=""
                                      data-v-15d61d2e="" class="btn-secondary btn" on="saved">
                    {{ __('已保存。') }}
                </x-jet-action-message>
            </div>
        </div>
    </x-slot>
</x-jet-form-section>
