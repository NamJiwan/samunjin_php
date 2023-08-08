// 예시로 사용할 사진 URL 배열
const photoURLs = [
    './images/gallery_img/1.jpg',    
    './images/gallery_img/2.jpg',    
    './images/gallery_img/3.jpg',    
    './images/gallery_img/4.jpg',    
    './images/gallery_img/5.jpg',    
    './images/gallery_img/6.jpg',    
    './images/gallery_img/7.jpg',    
    './images/gallery_img/8.jpg',    
    './images/gallery_img/9.jpg',    
    './images/gallery_img/10.jpg',    
    './images/gallery_img/11.jpg',    
    './images/gallery_img/12.jpg',    
    './images/gallery_img/13.jpg',    
    './images/gallery_img/14.jpg',    
    './images/gallery_img/15.jpg',    
    './images/gallery_img/16.jpg',    
    './images/gallery_img/17.jpg',    
    './images/gallery_img/18.jpg',    
    './images/gallery_img/19.jpg',    
    './images/gallery_img/20.jpg',    
    './images/gallery_img/21.jpg',    
    './images/gallery_img/22.jpg',    
    './images/gallery_img/23.jpg',    
    './images/gallery_img/24.jpg',      
    // 추가적인 사진 URL들...
    ];
    
    // 페이지 로드 시 최초로 4장의 사진 보여주기
    const initialPhotos = 8;
    let currentPhotoIndex = 0;
    
    // 사진을 더 보여주는 함수
    function showItems() {
        const galleryDiv = document.getElementById('gallery');
        galleryDiv.style.display = 'block'; // div 보이게 설정
    
        // currentPhotoIndex부터 initialPhotos만큼 사진을 추가
        for (let i = currentPhotoIndex; i < currentPhotoIndex + initialPhotos; i++) {
        if (i >= photoURLs.length) {
            // 이미 모든 사진을 다 보여준 경우 더 이상 추가하지 않음
            break;
        }
    
        const photoURL = photoURLs[i];
        const photoElement = document.createElement('div');
        photoElement.className = 'gallery-photo';
        photoElement.style.backgroundImage = `url(${photoURL})`;
    
        galleryDiv.appendChild(photoElement);
        }
    
        // 현재 사진 인덱스 업데이트
        currentPhotoIndex += initialPhotos;
    }

    function adjustItemsPerPage() {
        if (window.innerWidth < 768) {
          itemsPerPage = 2;
        } else if (window.innerWidth < 960) {
          itemsPerPage = 2;
        } else if (window.innerWidth < 1024) {
          itemsPerPage = 2;
        } else if (window.innerWidth < 1280) {
          itemsPerPage = 4;
        } else {
          itemsPerPage = 5;
        }
      }

    window.addEventListener("resize", () => {
        adjustItemsPerPage();
      });
      // 해상도가 바뀌었을때 이벤트 발생
      adjustItemsPerPage();
      showItems();