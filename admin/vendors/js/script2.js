ray={
    ajax:function(st)
    {

        $(".success").show();
        setTimeout(function(){$("#load").hide();},10000);
    },
    show:function(el)
    {
        this.getID(el).style.display='';
    },
    getID:function(el)
    {
        return document.getElementById(el);
    }
}