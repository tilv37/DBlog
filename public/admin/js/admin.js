/**
 * Created by DINGSHUO on 2016/1/18.
 */


$("#checkAll").click(function(){
    if(this.checked){
        $("input[name='checklist']").each(function(){
            this.checked=true;
        });
    }else{
        $("input[name='checklist']").each(function(){
            this.checked=false;
        });
    }
});