var Helpers = {
    stripTags : function(item){
        return item.replace(/(<([^>]+)>)/ig,"");
    }, 
    strip_nbsp : function(item){
        return item.replace(/&nbsp;/ig," ");
    }, 
    reload : function(elem){
        var el = document.querySelector(elem);
        var content = el.innerHTML;
        el.innerHTML = content;
    }
}