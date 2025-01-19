window.addEventListener('scroll', function() {
    const element = document.querySelector('.tarinner-name');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

window.addEventListener('scroll', function() {
    const element = document.querySelector('.class-name');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

window.addEventListener('scroll', function() {
    const element = document.querySelector('.classinfo');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.2;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

function showSection(sectionId) {
    
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    document.getElementById(sectionId).classList.add('active');
}

window.addEventListener('scroll', function() {
    const element = document.querySelector('.service-text1');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

window.addEventListener('scroll', function() {
    const element = document.querySelector('.service-text2');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.3;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

window.addEventListener('scroll', function() {
    const element = document.querySelector('.service-text3');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.3;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});

window.addEventListener('scroll', function() {
    const element = document.querySelector('.service-text4');
    const position = element.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 1.5;  
    
    
    if (position < screenPosition) {
        element.classList.add('scrolled');
    } else {
        element.classList.remove('scrolled');  
    }
});


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (let i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
};


function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => {
        section.classList.remove('active');
    });
    document.getElementById(sectionId).classList.add('active');
}





