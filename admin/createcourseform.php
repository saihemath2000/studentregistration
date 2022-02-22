<html>
 <head>
   <title>Create a course</title>
   <style>
     input{
       font-size:18px;
     }
     label{
       font-size:20px;
     }
     body{
       font-family:'Roboto';
     }
   </style>
</head>
<body>
    <div id="add"></div>
</body>
<script>
    let j=1,p=1,count2=0;
    let idvalue="id";
    let nooftopics="nooftopics";
    let chapter="chapter";
    let topic="topic";
    let link="link";
    let divfortopics="divfortopics";
    let l=1;
    let array1=[];
    let s='';
    function forsubtopics(count){
      array1.push(count);
      console.log(array1);
      for(let k=1;k<=count;k++){
        var br = document.createElement('br');  
        var span3=document.createElement('span');
        var label5 = document.createElement('label');
        label5.setAttribute('for','topicname');
        label5.innerHTML='TopicName';
        label5.setAttribute('style','font-size:18px;');
        var input5 =document.createElement('input');
        input5.setAttribute('id',topic+l+'_'+k);
        input5.setAttribute('type','text');
        input5.setAttribute('name',topic+l+'_'+k);
        input5.setAttribute('placeholder','enter topic'+k);
        input5.required=true;
        span3.appendChild(label5);
        span3.appendChild(input5);
        //temp=temp+1; 
        var span4=document.createElement('span');
        var label6 = document.createElement('label');
        label6.setAttribute('for','enterlink'+k);
        label6.innerHTML='Link';
        label6.setAttribute('style','font-size:18px;');
        var input6 =document.createElement('input');
        input6.setAttribute('id',link+l+'_'+k);
        input6.setAttribute('type','text');
        input6.setAttribute('name',link+l+'_'+k);
        input6.setAttribute('placeholder','enter link'+k);
        input6.required=true;
        span4.appendChild(label6);
        span4.appendChild(input6);
        span4.appendChild(br);
        var pardiv =document.getElementById(divfortopics+l);
        pardiv.appendChild(span3);
        pardiv.appendChild(span4);
        label5.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");
        label6.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");
        span3.setAttribute("style","display:inline-block;margin:0 10px 10px 0");
        span4.setAttribute("style","display:inline-block;margin:0 10px 10px 0");
        //temp=temp+1;
      }
      l=l+1;
    }
    function forchapter(count){
        array1.push(count);
        for(let i=1;i<=count;i++){
           var mydiv1 = document.createElement('div');
           mydiv1.setAttribute('id',divfortopics+p);
           mydiv1.setAttribute('style','padding-left:50px;')
           var br = document.createElement('br');
           var span1=document.createElement('span');
           var label3 = document.createElement('label');
           label3.setAttribute('for','chaptername');
           label3.innerHTML="Module name";
           label3.setAttribute('style','font-size:18px;');
           var input3 =document.createElement('input');
           input3.setAttribute('id',chapter+p);
           input3.setAttribute('type','text');
           input3.setAttribute('name',chapter+p);
           input3.setAttribute('placeholder','enter module'+i);
           input3.required=true;
           span1.appendChild(label3);
           span1.appendChild(input3);
           var span2=document.createElement('span');
           var label4 = document.createElement('label');
           label4.setAttribute('for','nooftopics');
           label4.innerHTML="No of topics";
           label4.setAttribute('style','font-size:18px;');
           var input4 =document.createElement('input');
           input4.setAttribute('id',nooftopics+j);
           input4.setAttribute('type','text');
           input4.onchange=function(){forsubtopics(this.value);} 
           input4.setAttribute('name',nooftopics+j);
           input4.setAttribute('placeholder','enter no of topics');
           input4.required=true;
           span2.appendChild(label4);
           span2.appendChild(input4);
           span2.appendChild(br);
           fieldset.appendChild(span1);
           fieldset.appendChild(span2);
           label3.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");
           label4.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");  
           span1.setAttribute("style","display:inline-block;margin:0 10px 10px 0");
           span2.setAttribute("style","display:inline-block;margin:0 10px 10px 0");
           fieldset.appendChild(mydiv1);
           j=j+1; 
           //add br afterwards
          //  var count2=document.getElementById(idvalue+(j-1));
          //  count2=2;
          //  forsubtopics(count2,p);
           //j=j+(count2*2);
           p=p+1

        }
        fieldset.appendChild(input7); 
    }
    var mydiv = document.getElementById('add');
    //form element
    var form = document.createElement('form');
    form.setAttribute('id',"createcourse");
    form.setAttribute('method',"GET");
    form.setAttribute('action','database_for_create_course.php');
    //fieldset tag
    var fieldset = document.createElement('fieldset');
    //legend tag
    var legend = document.createElement('legend');
    legend.innerHTML='Create a Course';
    legend.setAttribute('style','font-size:22px;');   
    //label for course
    var label1 = document.createElement('label');
    label1.setAttribute('for','coursename');
    label1.innerHTML='Course';
    label1.setAttribute('style','font-size:18px;');
    //input for label1
    var input1 = document.createElement('input');
    input1.setAttribute('id','courseid');
    input1.setAttribute('name','courseid');
    input1.setAttribute('type','text');
    input1.setAttribute('placeholder','enter course');
    input1.required=true;

    //label for noofchapters
    var label2 = document.createElement('label');
    label2.setAttribute('for','noofchapters');
    label2.innerHTML='No of Modules';
    label2.setAttribute('style','font-size:18px;');
    //input for label1
    var input2 = document.createElement('input');
    input2.setAttribute('id','id2');
    input2.onchange=function(){forchapter(this.value);}
    input2.setAttribute('name','noofchapters');
    input2.setAttribute('type','text');
    input2.setAttribute('placeholder','enter no of modules');
    input2.required=true;
    //br tag
    var br = document.createElement('br');
    //input2.appendChild(br);
        
    fieldset.appendChild(legend);
    fieldset.appendChild(label1);
    fieldset.appendChild(input1);
    fieldset.appendChild(label2);
    fieldset.appendChild(input2);
    fieldset.appendChild(br);
    form.appendChild(fieldset);
    mydiv.appendChild(form);   
    form.setAttribute("style","width: 640px; margin: 0 auto; padding: 30px 0 30px 0;");
    fieldset.setAttribute("style","padding: 0 2em 2em 4em;background-color:#f5ef42 ;border:2px solid red;border-radius:8px;");
    label1.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");
    label2.setAttribute("style","display: block;padding: 1.5em 0 0 0;font-weight: bold;");
    //var count1 =document.getElementById('id2').value;
    //var count1=2;
    var input7 = document.createElement('input');
    input7.setAttribute('type','submit');      
    input7.setAttribute('name','createForm');      
    input7.setAttribute('class','button');      
    input7.setAttribute('value','CreateCourse');
    //forchapter(count1);
    //fieldset.appendChild(input7); 
    input7.setAttribute('style','display:block;background-color:#4CAF50;border-radius:12px;box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);');
</script>

</html>