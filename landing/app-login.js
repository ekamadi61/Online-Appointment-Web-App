const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


$(".sign-up-form").submit(function(e) {
  e.preventDefault(); // prevent actual form submit
  var form = $(this);
  var url = form.attr('action'); //get submit url [replace url here if desired]
  $.ajax({
       type: "POST",
       url: 'process.php',
       data: form.serialize(), // serializes form input
       success: function(data){
           console.log(data);
           if(data=='success'){
             alert("Signup sucessful!");
             $("#sign-in-btn").click(); //simulate login-btn click
           }
       }
  });
});

$(".sign-in-form").submit(function(e) {
  e.preventDefault(); // prevent actual form submit
  var form = $(this);
  var url = form.attr('action'); //get submit url [replace url here if desired]
  $.ajax({
       type: "POST",
       url: 'process.php',
       data: form.serialize(), // serializes form input
       success: function(data){
           console.log(data);
           if(data=='success'){
            
             window.location ='dashboard.html';
           }else{
            alert("login failed!");
           }
       }
  });
});

