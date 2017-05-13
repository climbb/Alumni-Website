<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <form id="form" name="formname" action="test2.php" method="get" onsubmit="div2form('form')">
            <input id="i1" name="i1name" type="text" value="10">
            <div id=t1 name="formdiv">sdajda;lkdja;ljdal;dj</div>
            <div id=t2 name="formdiv">aaaaaaaaaaaaaaaaaaaaaa</div>           
            <input type="submit" name="submit" value="submit">
        </form>
 </body>
    <script type="text/javascript" >
    function div2form(id){
        var form=document.getElementById(id);
        if(!form){
            return;
        }
        var divs=document.getElementsByName(id+'div')
        var i, ndivs=divs.length;
        for(i=0;i<ndivs;i++){
            if(document.getElementById('textarea'+divs[i].id)){
               document.getElementById('textarea'+divs[i].id).value=divs[i].innerHTML; 
            } else {
                var texta=document.createElement('TEXTAREA');
                texta.name=divs[i].id;
                texta.id='textarea'+divs[i].id;
                texta.value=divs[i].innerHTML;      
                texta.style.display='none';
                form.appendChild(texta);                
            }                  
        }          
    }
    </script>
</html>