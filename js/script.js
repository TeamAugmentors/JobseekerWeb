// =================================================
// team page Animation
// =================================================
if (document.URL.includes("team.html")) {
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
  const minTk = document.querySelector("#min-tk");
  const maxTk = document.querySelector("#max-tk");
  const thumbLeft = document.querySelector(".amount-slider .slider .thumb.left-indicator");
  const thumbRight = document.querySelector(".amount-slider .slider .thumb.right-indicator");
  const range = document.querySelector(".amount-slider .slider .range");
  console.log(thumbLeft);
  console.log(thumbRight);
  console.log(range);

  const jobCardContainer = document.querySelector(".explore-container .right .job-card-container");
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
  // console.log(jobCard);
  for (let i = 1; i <= 6; i++) {
    jobCardContainer.innerHTML += jobCard;
  }

  function setLeftThumb() {
    let min = parseInt(minTk.min);
    let max = parseInt(minTk.max);
    minTk.value = Math.min(parseInt(minTk.value), parseInt(maxTk.value));
    let percent = ((minTk.value - min) / (max - min)) * 100;
    // console.log(percent);
    thumbLeft.style.left = percent + "%";
    range.style.left = percent + "%";
  }
  function setRightThumb() {
    let min = parseInt(maxTk.min);
    let max = parseInt(maxTk.max);
    maxTk.value = Math.max(parseInt(maxTk.value), parseInt(minTk.value));
    let percent = ((maxTk.value - min) / (max - min)) * 100;
    thumbRight.style.right = (100 - percent) + "%";
    range.style.right = (100 - percent) + "%";
  }
  minTk.addEventListener("input", () => {
    setLeftThumb();
  });
  maxTk.addEventListener("input", () => {
    setRightThumb();
  });
  setLeftThumb();
  setRightThumb();

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