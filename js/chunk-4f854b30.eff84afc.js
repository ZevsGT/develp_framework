(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4f854b30"],{"1d0d":function(e,t,a){"use strict";a("9a22")},2048:function(e,t,a){"use strict";a.r(t);var n=a("7a23"),o=Object(n["withScopeId"])("data-v-391118bc");Object(n["pushScopeId"])("data-v-391118bc");var c={class:"container"},r={class:"o_c"},d={class:"head-body mb-3"},i={class:"header_text"},l=Object(n["createVNode"])("div",{class:"b_head_img"},null,-1);Object(n["popScopeId"])();var s=o((function(e,t,a,s,u,p){var b=Object(n["resolveComponent"])("nav-head"),m=Object(n["resolveComponent"])("header-oomponent"),h=Object(n["resolveComponent"])("component-footer"),f=Object(n["resolveComponent"])("component-bg-animated");return Object(n["openBlock"])(),Object(n["createBlock"])(n["Fragment"],null,[Object(n["createVNode"])("div",c,[Object(n["createVNode"])("div",r,[Object(n["createVNode"])(m,null,{default:o((function(){return[Object(n["createVNode"])(b),Object(n["createVNode"])("div",d,[Object(n["createVNode"])("div",i,[Object(n["createVNode"])("h1",null,Object(n["toDisplayString"])(u.pageData.title),1)]),l])]})),_:1}),Object(n["createVNode"])("div",{class:"s_text",innerHTML:u.pageData.data},null,8,["innerHTML"])]),Object(n["createVNode"])(h)]),Object(n["createVNode"])(f,{style:"position: fixed; height: 100vh"})],64)})),u=(a("b0c0"),a("96cf"),a("1da1")),p=a("559f"),b=a("bdf4"),m=a("08a6"),h=a("97fa"),f={components:{"component-footer":p["a"],"component-bg-animated":b["a"],"header-oomponent":m["a"],"nav-head":h["a"]},data:function(){return{pageData:{title:null,url_name:null,data:null}}},mounted:function(){this.loadPage()},watch:{$route:function(e,t){this.loadPage(),window.scrollTo(0,0)}},methods:{loadPage:function(){var e=this;return Object(u["a"])(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,e.$api.pages.getPage(e.$route.params.name).then((function(t){t.data.id&&(e.pageData=t.data,document.title=t.data.title)}));case 2:case"end":return t.stop()}}),t)})))()}}};a("1d0d");f.render=s,f.__scopeId="data-v-391118bc";t["default"]=f},"9a22":function(e,t,a){}}]);
//# sourceMappingURL=chunk-4f854b30.eff84afc.js.map