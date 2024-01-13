let del=document.getElementsByClassName("btn-del")[0];
let prname=document.getElementById("prname");
let uproductform=document.getElementById("uproductform");
let pro2=document.getElementById("hidId");
let prdesc=document.getElementById("product_desc");
let primage=document.getElementById("product_image");

let imgUpdate=document.getElementById("btnradio1");

let proid=document.getElementById("pro");
// console.log(did);

let btnEdit=document.getElementsByClassName("btn-edit");

let hid=document.getElementById("hidId");

let psave=document.getElementsByClassName("product_save")[0];

// console.log(btnEdit);
// console.log("Hello");
Array.from(btnEdit).forEach((element)=>{
   // console.log("click Attached");
   element.addEventListener('click',(e)=>{ 
  
      let pname=e.target.parentNode.parentNode;

      // proid.value=
      let pid=pname.querySelector("th");

      prname.value=pname.querySelector('td').innerText;
      // let pr=pname.querySelector('td');
      proid.value=pid.innerText;

      prdesc.value=pname.querySelectorAll('td')[1].innerText;

      // primage.value=pname.querySelectorAll('td')[2].src;

      // console.log(primage.value);    

      // console.log(del);
      
     

   })  
})

psave.addEventListener('click',(e)=>{
   // alert("attach");
   if(imgUpdate.checked)
   {
      // alert("Checked");
      hid.innerHTML+=`<input type="hidden" value="true" name="updateImage">`;
   }
   // e.preventDefault();
});

// imgUpdate.addEventListener('click',()=>{
//       hid.innerHTML=`<input type="hidden" value=${v} name="deleteId">`;
// });
 



del.addEventListener('click',(e)=>{
   // console.log("attached");
   // let d=e.target.parentNode;
   let v=document.getElementById("pro").value;
   let c=confirm("Do you really want to Delete a Product ?");
   if(c)
   {
      hid.innerHTML+=`<input type="hidden" value=${v} name="deleteId">`;
      uproductform.submit();
      // console.log(v);
   }      
   else
   {
      e.preventDefault;
   }
})

// console.log(did);
