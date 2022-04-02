 // function that rolling up navbar
 function rollUp() {
    window.addEventListener('scroll', function() {
        var header = document.querySelector('header');
        header.classList.toggle('sticky', window.scrollY > 80);
    });
}

// function that automatically switches slides every 5 seconds
const interval = setInterval(changeSlides, 5000);
let counter = 1;
function changeSlides() {
    document.getElementById("radio" + counter).checked = true;
    counter++;
    if(counter > 4) {
        counter = 1;
    }else {}
}

// function that manually change slides but the time left to change does not change
function manualChange(x) {
    counter = parseInt(x);
    changeSlides();
}

// function that add class to div to appear all sections
function revealSections() {
    window.addEventListener('scroll', function() {
        var reveals = document.querySelectorAll('.reveal');
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var revealTop = reveals[i].getBoundingClientRect().top;
            var revealPoint = 130;
            if (revealTop < windowHeight - revealPoint) {
                reveals[i].classList.add('active');
            }else {
                reveals[i].classList.remove('active');
            }
        }
    });
}

window.onload = () => {
    rollUp();
    changeSlides();
    revealSections();
}

// background for popup image, add arrows to change image
let galleryImages = document.querySelectorAll(".gallery-cell");
let latestOpenedImg;
let windowWidth = window.innerWidth;

galleryImages.forEach(function(image, index) {
    image.onclick = function() {
        latestOpenedImg = index + 1;
        let container = document.body;
        let newImgWindow = document.createElement('div');
        container.appendChild(newImgWindow);
        newImgWindow.setAttribute('class', 'img-window');
        newImgWindow.setAttribute('onclick', 'closeImg()');
        
        // create div with classe popup-img and id current-img
        let newImg = image.firstElementChild.cloneNode();
        newImgWindow.appendChild(newImg);
        newImg.classList.remove('gallery-cell-img');
        newImg.classList.add('popup-img');
        newImg.setAttribute('id', 'current-img');

        // create div for photo loading animation
        let animationWindow = document.createElement('div');
        animationWindow.setAttribute('class', 'loader');
        let dot1 = document.createElement('span');
        let dot2 = document.createElement('span');
        let dot3 = document.createElement('span');
        animationWindow.appendChild(dot1);
        animationWindow.appendChild(dot2);
        animationWindow.appendChild(dot3);
        newImgWindow.appendChild(animationWindow);
        
        // function that displays the loading animation for a photo, removes the div it is in and displays the photo
        function loadPopUpImg() {
            let loader = document.querySelector('.loader');
            let popupImg = document.querySelector('.popup-img');
            setTimeout(() => {
                loader.remove();
                popupImg.style.display = 'block';
                setTimeout(() => {
                    popupImg.style.opacity = 1;
                }, 50);
            }, 2000);
        }
        loadPopUpImg();

        // function that displays the navigation arrows and adds functionality
        newImg.onload = function() {
            let newNextBtn = document.createElement('a');
            newNextBtn.innerHTML = '&#8680;';
            container.appendChild(newNextBtn);
            newNextBtn.setAttribute('class', 'img-btn-next');
            newNextBtn.setAttribute('onclick', 'changeImg(1)');

            let newPrevBtn = document.createElement('a');
            newPrevBtn.innerHTML = '&#8678;';
            container.appendChild(newPrevBtn);
            newPrevBtn.setAttribute('class', 'img-btn-prev');
            newPrevBtn.setAttribute('onclick', 'changeImg(0)');
        }
    }
});

// function that close popup image
function closeImg() {
    document.querySelector('.img-window').remove();
    document.querySelector('.img-btn-next').remove();
    document.querySelector('.img-btn-prev').remove();
}

// function that change popup image
function changeImg(change) {
    document.querySelector('#current-img').remove();
    let getImgWindow = document.querySelector('.img-window');
    let newImg = document.createElement('img');
    getImgWindow.appendChild(newImg);
    let calcNewImg;
    if(change === 1) {
        calcNewImg = latestOpenedImg + 1;
        if(calcNewImg > galleryImages.length) {
            calcNewImg = 1;
        }
    }
    else if(change === 0) {
        calcNewImg = latestOpenedImg - 1;
        if(calcNewImg < 1) {
            calcNewImg = galleryImages.length;
        }
    }
    newImg.setAttribute('src', './images/gallery/gallery' + calcNewImg + '.jpg');
    newImg.setAttribute('class', 'popup-img');
    newImg.setAttribute('id', 'current-img');
    
    // add one more time opacity = 1 and display = "block" because new image have default opacity = 0 and display = "none"
    newImg.style.opacity = 1;
    newImg.style.display = 'block';

    latestOpenedImg = calcNewImg;
}