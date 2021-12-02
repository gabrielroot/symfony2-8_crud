$(document).ready(()=>{
    const floatingAdd = $(".floatingAdd")
    const alert = $(".alert")

    hideAlert(alert)
    animateFloatingAdd(floatingAdd)
})

const animateFloatingAdd = floatingAdd =>{
    floatingAdd.animate({height: '+=10px', width: '+=10px'}, "fast");

    floatingAdd.animate({width: '-=10px', height: '-=10px'}, "fast");
    floatingAdd.animate({right: '-=10px'}, 100);
    floatingAdd.animate({right: '+=20px'}, 100);
}

const hideAlert = alert => {
    alert.css('cursor', 'pointer')
    alert.click(()=>{
        alert.slideUp(200)
    })
}