
//Hide Header when menu is clicked
function hide_header(obj){
  const header = document.querySelector(".header");
  const nav = document.querySelector(".nav");
  header.classList.add("header-hidden");
  nav.classList.add("nav-after-scroll");
}
//Home-page slideshow

var front_img = ["front-img/1.png","front-img/2.png","front-img/3.png"];
var i=0;

function chg_img(obj){
  i=i+obj;
   if(i>=front_img.length){
      i=0;
   }
   else if(i<0)
   {
    i=front_img.length-1;       
   }
   document.getElementById("front-img").src=front_img[i];
}
setInterval(function () {
chg_img(1);
},5000);

//Scrolling Animation for services image
const observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('service-item-inner-div-show');
    }
    else
    {
        entry.target.classList.remove('service-item-inner-div-show');
    }
});
});

const hiddenElements = document.querySelectorAll('.service-item-inner-div-hidden');
hiddenElements.forEach((el) => observer.observe(el));

//Scrolling Animation for Title

const Titleobserver = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('title-show');
    }
    else
    {
        entry.target.classList.remove('title-show');
    }
});
});

const Title_hiddenElements = document.querySelectorAll('.title-hidden');
Title_hiddenElements.forEach((el) => Titleobserver.observe(el));

//Scrolling animation for product
const product_observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('product-item1-div-show');
    }
    else
    {
        entry.target.classList.remove('product-item1-div-show');
    }
});
});

const product_hiddenElements = document.querySelectorAll('.product-item1-div-hidden');
product_hiddenElements.forEach((el) => product_observer.observe(el));

//Scrolling animation for Contact us Section
const contactus_observer = new IntersectionObserver((entries) => {
entries.forEach((entry) => {
    if(entry.isIntersecting){
        entry.target.classList.add('contact-us-div-show');
    }
    else
    {
        entry.target.classList.remove('contact-us-div-show');
    }
});
});

const contactus_hiddenElements = document.querySelectorAll('.contact-us-div-hidden');
contactus_hiddenElements.forEach((el) => contactus_observer.observe(el));

//Scrooling animation for Spindle Repair page -Service Title
const spindle_repair_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('service-item1-div-show');
        }
        else
        {
            entry.target.classList.remove('service-item1-div-show');
        }
    });
    });
    const spindle_repair_hiddenElements = document.querySelectorAll('.service-item1-div-hidden');
    spindle_repair_hiddenElements.forEach((el) => spindle_repair_observer.observe(el));

//Scrooling animation for Spindle Repair page -Service SUBTitle
const spindle_repair_sub_title_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('sub-title-show');
        }
        else
        {
            entry.target.classList.remove('sub-title-show');
        }
    });
    });
    const spindle_repair_sub_title_hiddenElements = document.querySelectorAll('.sub-title-hidden');
    spindle_repair_sub_title_hiddenElements.forEach((el) => spindle_repair_sub_title_observer.observe(el));

  //Scrooling animation for Spindle Repair page -Service next div
  const service_item2_div_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('service-item2-div-show');
        }
        else
        {
            entry.target.classList.remove('service-item2-div-show');
        }
    });
    });
    const service_item2_div_hiddenElements = document.querySelectorAll('.service-item2-div-hidden');
    service_item2_div_hiddenElements.forEach((el) => service_item2_div_observer.observe(el));

  
//Scrolling animation for Item List CNC-MPM
const item_list_div_observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if(entry.isIntersecting){
            entry.target.classList.add('item-list-div-show');
        }
        else
        {
            entry.target.classList.remove('item-list-div-show');
        }
    });
    });
    const item_list_div_hiddenElements = document.querySelectorAll('.item-list-div-hidden');
    item_list_div_hiddenElements.forEach((el) => item_list_div_observer.observe(el));


//Hiding Header while Scrolling

{
    const header = document.querySelector(".header");
    const nav = document.querySelector(".nav");
    let lastScrollY = window.scrollY;
    window.addEventListener("scroll",() => {
        if(lastScrollY < window.scrollY){
            header.classList.add("header-hidden");
            nav.classList.add("nav-after-scroll");
        }
        else{
            header.classList.remove("header-hidden");
            nav.classList.remove("nav-after-scroll");
        }
        lastScrollY = window.scrollY;
    });
}



