(window.webpackJsonp=window.webpackJsonp||[]).push([[3],{80:function(t,e,i){"use strict";i.r(e),i.d(e,"default",(function(){return n}));var s=i(3);class n extends s.a{constructor(t){super("dob",t),this.$inputs=[],this.$inactiveInput=null,this.ignoreBlur=!1,this.$selected=null}_bind(){this.$inactiveField=this.findInactiveField(),this.$activeField=this.findActiveField(),this.$inputs=this.$activeField.getElementsByTagName("input"),this.$inactiveInput=this.$inactiveField.getElementsByTagName("input")[0],super._bind(),this.activateActiveInput(),this.bindSmoothInputTransitions(),this.revertToInactiveFieldOnBlur(),this.focusLastUnfilledInputOnClick()}_findInputElements(){return[this.$inactiveInput,...this.$inputs]}_release(){this.$inactiveField=null,this.$activeField=null,this.$inputs=null,this.$selected=null,this.$inactiveInput=null}selectInput(t){t.focus(),t.select(),this.$selected=t}activateActiveInput(){this.$inactiveField.addEventListener("focus",(t=>{this.toggleInputVisibility(),this.selectInput(this.$inputs[0])}).bind(this),!0)}focusLastUnfilledInputOnClick(){this.$activeField.addEventListener("mousedown",(t=>{if(t.preventDefault(),t.target==this.$activeField){for(var e=0;e<this.$inputs.length-1&&this.$inputs[e].value.length;e++);this.selectInput(this.$inputs[e])}else for(let e=0;e<this.$inputs.length;e++)t.target==this.$inputs[e]&&(this.ignoreBlur=!0,this.selectInput(this.$inputs[e]))}).bind(this))}revertToInactiveFieldOnBlur(){this.$activeField.addEventListener("blur",(t=>{if(this.selected=null,this.ignoreBlur)this.ignoreBlur=!1;else{for(let t=0;t<this.$inputs.length;t++){if(this.$inputs[t].value.length)return!1}this.toggleInputVisibility()}}).bind(this),!0)}bindSmoothInputTransitions(){for(let t=0;t<this.$inputs.length;t++){const e=this.$inputs[t],i=e.maxlength=new Number(e.getAttribute("data-maxlength")||0),s=t>0?this.$inputs[t-1]:null,n=t+1<this.$inputs.length?this.$inputs[t+1]:null;e.addEventListener("keyup",t=>{switch(t.keyCode){case 9:this.selectInput(e)}}),e.addEventListener("keydown",t=>{switch(t.keyCode){case 9:this.ignoreBlur=!0;break;case 37:case 38:case 39:case 40:case 13:break;case 8:s&&!e.value.length&&this.selectInput(s);break;default:e.value.length>=i&&(this.$selected==e?e.value="":n?(this.ignoreBlur=!0,this.selectInput(n),n.value.length&&t.preventDefault()):t.preventDefault()),this.$selected==e&&(this.$selected=null)}})}}toggleInputVisibility(){this.$inactiveField.classList.toggle("phantom"),this.$activeField.classList.toggle("phantom")}findInactiveField(){return this.node("dob-field-inactive")}findActiveField(){return this.node("dob-field-active")}}}}]);