(window.webpackJsonp=window.webpackJsonp||[]).push([[78],{84:function(e,n,t){"use strict";t.r(n),t.d(n,"default",(function(){return s}));var a=t(5);class s extends a.a{constructor(e){super("create-success",e)}_bind(){this.appendGAClientIdToContinuationLink(),this.notifyGTMOfNewAccoauntId()}appendGAClientIdToContinuationLink(){let e=this.node("flow-cta-btn"),n=window.ga;e&&n?n(n=>{const t=n.get("clientId"),a=new URL(e.href),s=new URL(a.searchParams.get("ref"));s.searchParams.append("id",t),a.searchParams.set("ref",s.href),e.href=a.href}):console.debug("Unable to append GA client-id to download link as expected elements are missing.")}notifyGTMOfNewAccoauntId(){let e=this.node("player-id"),n=e&&e.getAttribute("data-player-account-id")||"";n&&window.dataLayer&&window.dataLayer.push({event:"createSuccessStepLoad",userId:n})}}}}]);