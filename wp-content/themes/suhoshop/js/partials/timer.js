  const timer_counter = e => {
    timerFlag = false;
    const deadTime = '<i>00</i>:<i>00</i>:<i>00</i>';
    if(!e.dataset.time) return deadTime;
    const
      now = new Date(),
      timer = setInterval(() => {
        const
          deadline = new Date( now.getTime() + Number(e.dataset.time) * 60000 ),
          dateNow = new Date(),
          t = deadline - dateNow;

        let
          h = Math.floor((t % (1000 * 60 * 60 * 60)) / (1000 * 60 * 60)),
          m = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)),
          s = Math.floor((t % (1000 * 60)) / 1000);

        h = (h < 10) ? `0${h}` : h;
        m = (m < 10) ? `0${m}` : m;
        s = (s < 10) ? `0${s}` : s;

        if (t < 0){
          clearInterval(timer);
          alert("Reserve time has stalled and your goods can be bought by other buyers! Check what's left and continue.");
          timer_counter(document.querySelector('[data-time]'));
        }
        e.innerHTML = (t < 0) ? deadTime : `<i>${h}</i>:<i>${m}</i>:<i>${s}</i>`;
      }, 1000);
  }