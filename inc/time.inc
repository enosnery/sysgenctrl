 <script type="text/javascript">
 function startTime() {
     var today=new Date();
     var d=today.getDate();
     var mm=today.getMonth()+1;
     var y=today.getFullYear();
     var h=today.getHours();
     var m=today.getMinutes();
     var s=today.getSeconds();
     // add a zero in front of numbers<10
     d=checkTime(d);
     mm=checkTime(mm);
     h=checkTime(h);
     m=checkTime(m);
     s=checkTime(s);
     document.getElementById('txt').innerHTML=d+"/"+mm+"/"+y+"  -  "+h+":"+m+":"+s;
     t=setTimeout('startTime()',500);
 }

 function checkTime(i){
 if (i<10) {
     i="0" + i;
 }
     return i;
 }

</script>
<body onload="startTime()">
    <hr id="hrrodape"></hr>
<div class="txt" id="txt">
</div>
</body>