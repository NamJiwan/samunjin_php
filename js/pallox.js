
VanillaTilt.init(document.querySelectorAll(".your-element"), {
		max: 10,
     scale:1,   
		speed: 10
	});
	
	//It also supports NodeList
	VanillaTilt.init(document.querySelectorAll(".your-element"));



  const button1 = document.getElementById('scroll_down');
    const section1 = document.getElementById('events');

    button1.addEventListener('click', () => {
        window.scrollBy({top: section1.getBoundingClientRect().top, behavior: 'smooth'});
    });