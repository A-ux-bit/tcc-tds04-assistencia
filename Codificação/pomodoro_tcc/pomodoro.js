'use strict';

{
  const timer = document.getElementById('timer');
  const start = document.getElementById('start');
  const stop = document.getElementById('stop');
  const reset = document.getElementById('reset');
  const timeState = document.getElementById('timeState');
  const cycle = document.getElementById('cycle');
  const input_worktime = document.getElementById('input_worktime');
  const input_breaktime = document.getElementById('input_breaktime');
  const input_longbreaktime = document.getElementById('input_longbreaktime');
  const input_cyclecount = document.getElementById('input_cyclecount');
  const form_id = document.getElementById('form_id');

  
  let workTime = 25;
  let breakTime = 5;
  let longBreakTime = 20;
  let cycleCount = 4; 
  let state = "atividade";

  let startTime;
  let timeoutId;
  let elapsedTime = 0;
  let count = 1;

  
  const audio = new Audio();

  
  function displayState (state, count) {
    timeState.textContent = state;
    if (state === "atividade")
      cycle.textContent = `vezes：${count}/${Number(cycleCount)}`;
  }

  
  function displayTime(time) {
    timer.textContent = `${String(time).padStart(2, '0')}:00`;
  }

  
  function displayInput(workTime, breakTime, longBreakTime, cycleCount) {
    input_worktime.textContent = `：${workTime}`;
    input_breaktime.textContent = `：${breakTime}`;
    input_longbreaktime.textContent = `：${longBreakTime}`;
    input_cyclecount.textContent = `：${cycleCount}`;
  }

  function countDown(time) {
    const remainigTime = (time * 60 *1000) - elapsedTime - (Date.now() - startTime);
    const restMin = String(Math.floor((remainigTime / 1000 / 60) % 60)).padStart(2, '0');
    const restSec = String(Math.floor((remainigTime / 1000) % 60)).padStart(2, '0');
    timer.textContent = `${restMin}:${restSec}`;
    document.title = `${restMin}:${restSec} Pomodoro Timer`;
    if (remainigTime >= 0) {
      timeoutId = setTimeout(() => {
        countDown(time);
        }, 100); 
    } else if (remainigTime < 0 ) {
      clearTimeout(timeoutId);
      startTime = Date.now();
      elapsedTime = 0;
      if (count === cycleCount && state === "atividade") {
        audio.src = "https://naomi-homma.github.io/Pomodoro_Timer/assets/audio/hatoclock.mp3#t=0,3.5";
        const playPromise = audio.play();
        if(playPromise !== undefined) {
          playPromise.then(_ => {
          })
          .catch(error => {
            console.log(error);
          });
        }
        state = "intervalo longo";
        displayState(state);
        countDown(longBreakTime);
      } else if (count !== cycleCount && state === "atividade") {
        audio.src = "https://naomi-homma.github.io/Pomodoro_Timer/assets/audio/hatoclock.mp3#t=0,3.5";
        const playPromise = audio.play();
        if(playPromise !== undefined) {
          playPromise.then(_ => {
          })
          .catch(error => {
            console.log(error);
          });
        }
        state = "intervalo";
        console.log(count);
        console.log(cycleCount);
        displayState(state);
        countDown(breakTime);
      } else if (state === "intervalo") {
        audio.src = "https://naomi-homma.github.io/Pomodoro_Timer/assets/audio/hatoclock.mp3#t=0,3.5";
        const playPromise = audio.play();
        if(playPromise !== undefined) {
          playPromise.then(_ => {
          })
          .catch(error => {
            console.log(error);
          });
        }
        state = "atividade";
        count ++;
        displayState(state, count);
        countDown(workTime);
      }  else if (state === "intervalo longo") {
        audio.src = "https://naomi-homma.github.io/Pomodoro_Timer/assets/audio/hatoclock.mp3#t=0,3.5";
      const playPromise = audio.play();
        if(playPromise !== undefined) {
          playPromise.then(_ => {
          })
          .catch(error => {
            console.log(error);
          });
        }
        state = "atividade";
        count = 1;
        displayState(state, count);
        countDown(workTime);
      }
    }
  }

  console.log(count === cycleCount);

  
  function setButtonStateInitial() {
    start.disabled = false;
    stop.disabled = true;
    reset.disabled = true;
  }

  function setButtonStateRunning() {
    start.disabled = true;
    stop.disabled = false;
    reset.disabled = true;
  }

  function setButtonStateStopped() {
    start.disabled = false;
    stop.disabled = true;
    reset.disabled = false;
  }

  start.addEventListener('click', () => {
    setButtonStateRunning();
    startTime = Date.now();
    switch (state) {
      case "atividade": countDown(workTime);
        break;
      case "intervalo": countDown(breakTime);
        break;
      case "intervalo longo": countDown(longBreakTime);
        break;
    }
  });

  stop.addEventListener('click', () => {
    setButtonStateStopped();
    clearTimeout(timeoutId);
    elapsedTime += Date.now() - startTime;
  });

  reset.addEventListener('click', () => {
    setButtonStateInitial();
    switch (state) {
      case "atividade": displayTime(workTime);
        break;
      case "intervalo": displayTime(breakTime);
        break;
      case "intervalo longo": displayTime(longBreakTime);
        break;
    }
    elapsedTime = 0;
  });

  
    form_id.addEventListener('submit', () => {
    workTime = work_time.value;
    breakTime = break_time.value;
    longBreakTime = longbreak_time.value;
    cycleCount = cycle_count.value;
    displayInput(workTime, breakTime, longBreakTime, cycleCount);
    displayTime(workTime);
    displayState(state, count);
  });

  
  displayState(state, count);
  displayTime(workTime);
  displayInput(workTime, breakTime, longBreakTime, cycleCount);
  setButtonStateInitial();

}


document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
});