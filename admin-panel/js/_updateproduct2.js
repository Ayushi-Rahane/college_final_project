let del=document.getElementsByClassName("btn-del")[0];
let uproduct=document.getElementById("upproduct");
let uproductform=document.getElementById("uproductform");
let pro2=document.getElementById("p1");
// console.log(did);

let btnEdit=document.getElementsByClassName("btn-edit");
// console.log(btnEdit);
console.log("Hello");
Array.from(btnEdit).forEach((element)=>{
   // console.log("click Attached");
   element.addEventListener('click',(e)=>{ 
  
      let pname=e.target.parentNode.parentNode;

      // let pid=pname.querySelector("th");
      // pro2.value=pid.innerText;
      console.log(pname);    
   })  
})
 
let hid=document.getElementById("hidId");


del.addEventListener('click',(e)=>{
   // console.log("attached");
   // let d=e.target.parentNode;
   let v=document.getElementById("pro").value;
   let c=confirm("Do you really want to Delete a Product ?");
   if(c)
   {
      hid.innerHTML+=`<input type="hidden" value=${v} name="deleteId">`;
      uproductform.submit();
   }      
   else
   {
      e.preventDefault;
   }
   // console.log(did);
})

