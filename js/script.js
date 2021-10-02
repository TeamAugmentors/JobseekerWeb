function map(x, in_min, in_max, out_min, out_max) {
  return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;
}
if (document.URL.includes("team.php")) {
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
else if (document.URL.includes("signin.php")) {
  // =====================Sign inpage back button===============================
  const signInBackButton = document.querySelector(".signin-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("signup.php")) {
  // =====================Sign inSign up page back button===============================
  const signInBackButton = document.querySelector(".signup-page .arrow-left");
  signInBackButton.addEventListener('click', () => {
    history.back();
  });
}
else if (document.URL.includes("explore.php")) {
  const catagoryIconTriangle = document.querySelector(".catagory-div .icon-triangle");
  const catagoryItems = document.querySelector(".explore-container .left .choose-catagory");
  const budgetIconTriangle = document.querySelector(".budget-div .icon-triangle");
  const budgetContainer = document.querySelector(".budget-div .content");
  const jobCardContainer = document.querySelector(".explore-container .right .job-card-container");
  const thumbsContainer = document.querySelector(".amount-slider .thumbs");
  const leftThumb = document.querySelector(".amount-slider .left-thumb");
  const rightThumb = document.querySelector(".amount-slider .right-thumb");
  const selectedTrack = document.querySelector(".amount-slider .track-selected");
  const tkMin = document.querySelector(".slider-container .tk-min");
  const tkMax = document.querySelector(".slider-container .tk-max");
  const inputTkMin = document.querySelector(".input-amount .input-tk-min");
  const inputTkMax = document.querySelector(".input-amount .input-tk-max");
  console.log(inputTkMin);
  console.log(inputTkMax);
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
  for (let i = 1; i <= 10; i++) {
    jobCardContainer.innerHTML += jobCard;
  }
  let isLeftThumb = false;
  let isRightThumb = false;
  let thumbposLeft = 20;
  let thumbposRight = 80;
  function initSliders() {
    leftThumb.style.left = `${thumbposLeft}%`;
    selectedTrack.style.left = `${thumbposLeft}%`;
    rightThumb.style.left = `${thumbposRight}%`;
    selectedTrack.style.right = `${100 - thumbposRight}%`;
    inputTkMin.value = parseInt(map(thumbposLeft, 0, 100, 0, 50000));
    inputTkMax.value = parseInt(map(thumbposRight, 0, 100, 0, 50000));
    tkMin.innerText = inputTkMin.value / 1000 + 'k';
    tkMax.innerText = inputTkMax.value / 1000 + 'k';
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
      let thumbContainerWidth = rect.width;
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
      inputTkMin.value = parseInt(map(thumbposLeft, 0, 100, 0, 50000));
      tkMin.innerText = parseInt(inputTkMin.value / 1000) > 0 ? parseInt(inputTkMin.value / 1000) + 'k' : 0;

    } else if (rightThumb) {
      let dx = e.clientX;
      let rect = thumbsContainer.getBoundingClientRect();
      let thumbsContainerLeft = rect.left;
      let thumbContainerWidth = rect.width;
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
      inputTkMax.value = parseInt(map(thumbposRight, 0, 100, 0, 50000));
      tkMax.innerText = parseInt(inputTkMax.value / 1000) > 0 ? parseInt(inputTkMax.value / 1000) + 'k' : 0;
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

  inputTkMin.addEventListener('change', () => {
    let minTk = parseInt(inputTkMin.value);
    let maxTk = parseInt(inputTkMax.value);
    if (minTk > maxTk) {
      minTk = maxTk;
    }
    minTk = Math.min(minTk, 50000);
    inputTkMin.value = minTk;
    thumbposLeft = parseInt(map(minTk, 0, 50000, 0, 100));
    leftThumb.style.left = `${thumbposLeft}%`;
    selectedTrack.style.left = `${thumbposLeft}%`;
    let tkMinText = parseInt(inputTkMin.value / 1000)
    tkMin.innerText = tkMinText > 0 ? tkMinText + 'k' : 0;
  });
  inputTkMax.addEventListener('change', () => {
    let minTk = parseInt(inputTkMin.value);
    let maxTk = parseInt(inputTkMax.value);
    if (maxTk < minTk) {
      maxTk = minTk;
    }
    maxTk = Math.min(maxTk, 50000);
    inputTkMax.value = maxTk;
    thumbposRight = parseInt(map(maxTk, 0, 50000, 0, 100));
    rightThumb.style.left = `${thumbposRight}%`;
    // console.log(thumbposRight);
    selectedTrack.style.right = `${100 - thumbposRight}%`;
    tkMaxText = parseInt(inputTkMax.value / 1000);
    tkMax.innerText = tkMaxText > 0 ? tkMaxText + 'k' : 0;
  });

  isToggleCatagory = false;
  isToggleBudget = false;

  // ------------------This is for setting the opacity and height after loading the page----------------
  budgetContainer.style.maxHeight = budgetContainer.scrollHeight + "px";;
  budgetContainer.style.opacity = '1';
  catagoryItems.style.maxHeight = catagoryItems.scrollHeight + "px";
  catagoryItems.style.opacity = '1';
  catagoryItems.style.marginBottom = '2rem';

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
} else if (document.URL.includes("profile.php")) {
  const changePictureBtn = document.querySelector('.change-picture-btn');
  const avaterImage = document.querySelector('.avatar-img');
  const chooseImage = document.querySelector('.choose-image');
  const skillInput = document.getElementById('Skills');
  const skillAddBtn = document.querySelector('.skill-add-btn');
  const chipContainer = document.querySelector('.chip-container');

  const log = (x) => console.log(x);

  chooseImage.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = () => {
        const result = reader.result;
        avaterImage.src = result;
      };
      reader.readAsDataURL(file);
    }
  });

  addEventTochip();

  changePictureBtn.addEventListener('click', function () {
    chooseImage.click();
  });


  skillAddBtn.addEventListener('click', () => {
    if (skillInput.value.length > 0 && chipContainer.childElementCount < 6) {
      addItemToChip(skillInput.value);
      skillInput.value = '';
      addEventTochip();
    } else {
      alert('Too many skills are harmful');
    }
  })

  function addItemToChip(value) {
    let cardDiv = document.createElement('div');
    cardDiv.classList.add('chip');
    let chip = `
            <div class="chip-content">${value}</div>
                <div class="chip-close">
                    <svg class="chip-svg" focusable="false" viewBox="0 0 24 24"
                        aria-hidden="true">
                        <path
                            d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10 10-4.47 10-10S17.53 2 12 2zm5 13.59L15.59 17 12 13.41 8.41 17 7 15.59 10.59 12 7 8.41 8.41 7 12 10.59 15.59 7 17 8.41 13.41 12 17 15.59z">
                        </path>
                    </svg>
                </div>`
    cardDiv.innerHTML = chip;
    chipContainer.append(cardDiv);
  }

  function addEventTochip() {
    const chipSvg = document.querySelectorAll('.chip-svg');
    const chip = document.querySelectorAll('.chip');
    for (let i = 0; i < chipSvg.length; i++) {
      chipSvg[i].addEventListener('click', () => {
        chip[i].remove();
      });
    }
    log(chip);
  }
}