$(document).ready(()=>{
    const floatingAdd = $(".floatingAdd")
    const alert = $(".flashAlert")

    animateFlashAlert(alert)
    hideAlert(alert)

    animateFloatingAdd(floatingAdd)
})

const animateFloatingAdd = floatingAdd =>{
    floatingAdd.animate({height: '+=10px', width: '+=10px'}, "fast");

    floatingAdd.animate({width: '-=10px', height: '-=10px'}, "fast");
    floatingAdd.animate({right: '-=10px'}, 100);
    floatingAdd.animate({right: '+=20px'}, 100);
    floatingAdd.animate({right: '-=10px'}, 100);
}

const animateFlashAlert = alert =>{
    alert.animate({right: '+=100px'}, "fast");

    alert.animate({right: '-=110px'}, 100);
    alert.animate({right: '+=20px'}, 100);
    alert.animate({right: '-=10px'}, 100);
}

const hideAlert = alert => {
    alert.click(()=>{
        alert.slideUp(200)
    })
}