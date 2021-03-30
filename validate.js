var roleArry = ["","User", "Other"];
var role = roleArry[localStorage.getItem("role")];
if(role == undefined){
    //request.getSession().invalidate();
    location.href = "login.html";
}