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

    floatingAdd.hover(()=>{
        floatingAdd.css('display', 'flex')
        floatingAdd.css('alignItems', 'center')

        floatingAdd.css('width', '250px')
        floatingAdd.css('borderRadius', '10px')

        const p = $(".floatingAdd p")
        p.attr('class', '')
        p.css('color', 'white')
        p.css('fontSize', '1.5em')
        p.css('margin', '0')

    },()=>{
        $(".floatingAdd p").attr('class', 'hidden')
        floatingAdd.css('width', '79px')
        floatingAdd.css('borderRadius', '100%')
    })
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