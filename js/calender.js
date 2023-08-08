$(function () {
  // .sec3 - pc/tablet
  $(".multi-select-calendar").pignoseCalendar({
    multiple: false,
    select: onSelectHandler,
    minDate: moment().format("YYYY-MM-DD"), // 지난날짜 선택 못함
  });
  function onSelectHandler(date, context) {
    var $element = context.element;
    var $calendar = context.calendar;
    var $box = $element.siblings(".box").show();
    var text = "선택하신 날짜 :  ";

    if (date[0] !== null) {
      text += date[0].format("YYYY-MM-DD");
      $(".reserve-select").slideDown(500);
    }

    if (date[0] !== null && date[1] !== null) {
      text += " ~ ";
    } else if (date[0] === null && date[1] == null) {
      text += "nothing";
      $(".reserve-select").slideUp(500);
    }

    if (date[1] !== null) {
      text += date[1].format("YYYY-MM-DD");
    }

    $box.text(text);
  }
  //시간선택시 클래스 추가
  $(".select-time").on("click", function (e) {
    $(e.target).addClass("select");
    $(e.target).siblings().removeClass("select");
  });

  //장소 선택시 클래스 추가
  $(".select-reserve-box div span").on("click", function (e) {
    $(e.target).toggleClass("ck_active");
  });

  // 예약 버튼에 Click Listener 대기시킴 ,kangelee
  $(".reserve-submit").on("click", function () {
    const type = $(this).data("type"); // 예약 유형 가져옴 HTML내 submit버튼에 지정해놓음 FERRY/PICNIC ,kangelee
    const $box = $(this).siblings(".box");
    const selectedDates = $box
      .text()
      .replace("선택하신 날짜 :  ", "")
      .split(" ~ ");

    // 서버 전송을 위한 데이터 구성 [임의지정해놓음] , kangelee
    const data = {
      type: type,
      startDate: selectedDates[0],
      endDate: selectedDates[1] || null, // 종료 날짜가 없을 경우 null 로 , kangelee
    };

    // AJAX를 사용[서버로 데이터 전송]
    $.ajax({
      url: "index.html", // 실제 엔드포인트로 변경 필요. 추후 진행하겠음
      type: "POST",
      data: JSON.stringify(data),
      contentType: "application/json",
      success: function (response) {
        alert("예약이 성공적으로 완료되었습니다!");
      },
      error: function (error) {
        alert("예약 중 오류가 발생했습니다. 다시 시도해주세요.");
      },
    });
  });
});
