function map(x, in_min, in_max, out_min, out_max) {
  return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}
if (document.URL.includes("team.html")) {
  // =================================================
  // team page Animation
  // =================================================
  new fullpage('#team-fullpage', {
    anchors: ['intro', 'sanjid', 'atikur', 'tanim'],
    navigation: true,
    navigationTooltips: ['Intro', 'Sanjid Islam Chowdhury', 'Md. Atikur Rahman', 'Ahmed Saad Tanim'],
  });

  let i = 0;
  let text = 'Meet the team.';
  let textSpeed = 100;

  function typeWriter() {
    if (i < text.length) {
      document.querySelector("#team--hero-header").innerHTML += text.charAt(i++);
      setTimeout(typeWriter, textSpeed);
    }
  }
  typeWriter();
}
else if (document.URL.includes("signin.html")) {
  // =====================Sign inpage back button===============================
  const signInBackButton = document.querySelector(".signin-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("signup.html")) {
  // =====================Sign inSign up page back button===============================
  const signInBackButton = document.querySelector(".signup-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("explore.html")) {
  const catagoryIconTriangle = document.querySelector(".catagory-div .icon-triangle");
  const catagoryItems = document.querySelector(".explore-container .left .choose-catagory");
  const budgetIconTriangle = document.querySelector(".budget-div .icon-triangle");
  const budgetContainer = document.querySelector(".budget-div .content");
  const jobCardContainer = document.querySelector(".explore-container .right .job-card-container");
  const thumbsContainer = document.querySelector(".amount-slider .thumbs");
  const leftThumb = document.querySelector(".amount-slider .left-thumb");
  const rightThumb = document.querySelector(".amount-slider .right-thumb");
  const selectedTrack = document.querySelector(".amount-slider .track-selected");
  const jobCard = `<div class="job-card">
  <div class="job-card-header">
      <h1 class="catagory">Graphics & design</h1>
      <h1 class="job-name">Illustration</h1>
      <div class="amount-div">
          <div class="tk-icon">
              <img src="images/taka3.svg" alt="">
          </div>
          <h1 class="amount">3000</h1>
      </div>
      <div class="line"></div>
      <div class="details">
          <div class="duration">
              <div class="details-left">Duration</div>
              <div class="details-right">2 Days</div>
          </div>
          <div class="revisions">
              <div class="details-left">revisions</div>
              <div class="details-right">4</div>
          </div>
          <div class="negotiable">
              <div class="details-left">Negotiable</div>
              <div class="details-right">No</div>
          </div>
      </div>
      <div class="description">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident ipsum
              perferendis autem, aliquid eos voluptatibus id suscipit, odio temporibus sed et
              nam
              repellendus eaque numquam cum reprehenderit nemo repudiandae rerum!</p>
      </div>
      <button class="card-button">See More</button>
  </div>
</div>`;
  for (let i = 1; i <= 6; i++) {
    jobCardContainer.innerHTML += jobCard;
  }
  let isLeftThumb = false;
  let isRightThumb = false;
  let thumbposLeft = 25;
  let thumbposRight = 75;
  function initSliders() {
    leftThumb.style.left = `${thumbposLeft}%`;
    selectedTrack.style.left = `${thumbposLeft}%`;
    rightThumb.style.left = `${thumbposRight}%`;
    selectedTrack.style.right = `${100 - thumbposRight}%`;
  }

  initSliders();

  function mouseDownHandler(e) {
    console.log("Mouse Down");
    if (e.target == leftThumb) {
      isLeftThumb = true;
    } else if (e.target == rightThumb) {
      isRightThumb = true;
    }
    document.addEventListener('mousemove', mouseMoveHandler);
    document.addEventListener('mouseup', mouseUpHandler);
  }

  function mouseMoveHandler(e) {
    // prnt("Mouse move");
    if (isLeftThumb) {
      let dx = e.clientX;
      let rect = thumbsContainer.getBoundingClientRect();
      let thumbsContainerLeft = rect.left;
      let thumbContainerWidth = thumbsContainer.getBoundingClientRect().width;
      thumbposLeft = (dx - thumbsContainerLeft) / thumbContainerWidth * 100;
      console.log(`posLeft ${thumbposLeft}, pos Right ${100 - thumbposRight}`);
      if (thumbposLeft > thumbposRight) {
        thumbposLeft = thumbposRight;
      }
      else if (thumbposLeft < 0) {
        thumbposLeft = 0;
      }
      // prnt(`posLeft ${thumbposLeft}, pos Right ${100 - thumbposRight}`);
      leftThumb.style.left = `${thumbposLeft}%`;
      selectedTrack.style.left = `${thumbposLeft}%`;
    } else if (rightThumb) {
      let dx = e.clientX;
      let rect = thumbsContainer.getBoundingClientRect();
      let thumbsContainerLeft = rect.left;
      let thumbContainerWidth = thumbsContainer.getBoundingClientRect().width;
      thumbposRight = (dx - thumbsContainerLeft) / thumbContainerWidth * 100;
      if (thumbposRight < thumbposLeft) {
        thumbposRight = thumbposLeft;
      }
      else if (thumbposRight > 100) {
        thumbposRight = 100;
      }
      // prnt(`posLeft ${thumbposLeft}, pos Right ${100 - thumbposRight}`);
      rightThumb.style.left = `${thumbposRight}%`;
      selectedTrack.style.right = `${100 - thumbposRight}%`;
    }
  }
  function mouseUpHandler() {
    console.log("Mouse Up");
    isLeftThumb = false;
    isRightThumb = false;
    document.removeEventListener('mousemove', mouseMoveHandler);
    document.removeEventListener('mouseup', mouseUpHandler);
  };

  leftThumb.addEventListener('mousedown', mouseDownHandler);
  leftThumb.addEventListener('mouseup', mouseMoveHandler);

  rightThumb.addEventListener('mousedown', mouseDownHandler);
  rightThumb.addEventListener('mouseup', mouseMoveHandler);


  isToggleCatagory = false;
  isToggleBudget = false;

  budgetIconTriangle.addEventListener('click', () => {
    if (!isToggleBudget) {
      budgetIconTriangle.style.transform = 'rotate(-90deg)';
      budgetContainer.style.maxHeight = '0';
      budgetContainer.style.opacity = '0';
      isToggleBudget = true;
    } else {
      budgetIconTriangle.style.transform = 'rotate(0deg)';
      budgetContainer.style.maxHeight = budgetContainer.scrollHeight + "px";
      budgetContainer.style.opacity = '1';
      isToggleBudget = false;
    }
  })

  catagoryIconTriangle.addEventListener("click", () => {
    if (!isToggleCatagory) {
      catagoryIconTriangle.style.transform = 'rotate(-90deg)';
      catagoryItems.style.maxHeight = '0';
      catagoryItems.style.opacity = '0';
      isToggleCatagory = true;
    } else {
      catagoryIconTriangle.style.transform = 'rotate(0deg)';
      catagoryItems.style.maxHeight = catagoryItems.scrollHeight + "px";
      catagoryItems.style.opacity = '1';
      isToggleCatagory = false;
    }
  })
}