const el = document.getElementById('select_table');
const box1 = document.getElementById('hs');
const box2 = document.getElementById('de');
const box3 = document.getElementById('em');
const box4 = document.getElementById('do');
const box5 = document.getElementById('pi');
const box6 = document.getElementById('nu');
const box7 = document.getElementById('lb');
const box8 = document.getElementById('rm');
const box9 = document.getElementById('pr');
const box10 = document.getElementById('t');
const box11 = document.getElementById('ap');
const box12 = document.getElementById('md');
const box13 = document.getElementById('me');
el.addEventListener('change', function handleChange(event) {
  if (event.target.value === '1') {
    box1.style.display = 'block';
  } else {
    box1.style.display = 'none';
  }
  if (event.target.value === '2') {
    box2.style.display = 'block';
  } else {
    box2.style.display = 'none';
  }
  if (event.target.value === '3') {
    box3.style.display = 'block';
  } else {
    box3.style.display = 'none';
  }
  if (event.target.value === '4') {
    box4.style.display = 'block';
  } else {
    box4.style.display = 'none';
  }
  if (event.target.value === '5') {
    box5.style.display = 'block';
  } else {
    box5.style.display = 'none';
  }
  if (event.target.value === '6') {
    box6.style.display = 'block';
  } else {
    box6.style.display = 'none';
  }
  if (event.target.value === '7') {
    box7.style.display = 'block';
  } else {
    box7.style.display = 'none';
  }
  if (event.target.value === '8') {
    box8.style.display = 'block';
  } else {
    box8.style.display = 'none';
  }
  if (event.target.value === '9') {
    box9.style.display = 'block';
  } else {
    box9.style.display = 'none';
  }
  if (event.target.value === '10') {
    box10.style.display = 'block';
  } else {
    box10.style.display = 'none';
  }
  if (event.target.value === '11') {
    box11.style.display = 'block';
  } else {
    box11.style.display = 'none';
  }
  if (event.target.value === '12') {
    box12.style.display = 'block';
  } else {
    box12.style.display = 'none';
  }
  if (event.target.value === '13') {
    box13.style.display = 'block';
  } else {
    box13.style.display = 'none';
  }
});
