let productName=document.getElementById("p1");
let realPrice=document.getElementById("p2");
let scratchPrice=document.getElementById("p3");
let quantity=document.getElementById("p4");
let productSize=document.getElementById("p7");
let productCategory=document.getElementById("p8");
let productStatus=document.getElementById("p10");

let pro=document.getElementById("pro");


btnEdit=document.getElementsByClassName("btn-edit");
// console.log(btnEdit);

Array.from(btnEdit).forEach((element)=>{
   // console.log("click Attached");
   element.addEventListener('click',(e)=>{
      // console.log(e.target);
      // console.log(e.target);
      // console.log(e.target.parentNode.parentNode);
      let pname=e.target.parentNode.parentNode;

      let pname2=pname.querySelectorAll("td")[0];
      productName.value=pname2.innerText;

      let qt=pname.querySelectorAll("td")[1];
      quantity.value=qt.innerText;
      
      let ct=pname.querySelectorAll("td")[2];
      productCategory.value=ct.innerText;

      let op=pname.querySelectorAll("td")[3];
      realPrice.value=op.innerText;

      let sprice=pname.querySelectorAll("td")[4];
      scratchPrice.value=sprice.innerText;
      
      let pstatus=pname.querySelectorAll("td")[5];
      let ps2=pstatus.querySelector("span").innerText;
      productStatus.value=ps2;

      let pid=pname.querySelector("th");
      pro.value=pid.innerText;
      // console.log(pid.innerText);   
   })
})

