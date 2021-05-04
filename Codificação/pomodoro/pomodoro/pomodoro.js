const imgApagado = document.querySelector('.img-apagado');
const imgAceso = document.querySelector('.img-aceso');
const tempoElem = document.querySelector('.tempo');
const btnPadrao = document.querySelector('#btn-padrao');
const btnPausaCurta = document.querySelector('#btn-pausa-curta');
const btnPausaLonga = document.querySelector('#btn-pausa-longa');
const btnSalvar = document.querySelector('#btn-salvar');
const btnPlay = document.querySelector('#btn-play');
const btnPause = document.querySelector('#btn-pause');
const btnRestart = document.querySelector('#btn-restart');
const iptMinutos = document.querySelector('#ipt-minutos');
const iptSegundos = document.querySelector('#ipt-segundos');
const loginpagina = document.querySelector('#login-pag');
const iptnomeatv = document.querySelector('#ipt-nomeatv');

let intervaloAtual = null;

let tempoMinutos = 25;
let tempoSegundos = 0;

let tempoAtualSegundos = (tempoMinutos * 60) + tempoSegundos;

function renderizarTempo() {
    const minutos = Math.trunc(tempoAtualSegundos / 60);
    const segundos = tempoAtualSegundos - (60 * minutos);
    tempoElem.innerHTML = `${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
}

function configurarTempoAtual() {
    tempoAtualSegundos = (tempoMinutos * 60) + tempoSegundos;
}

function pararIntervalo() {
    if (intervaloAtual != null) {
        clearInterval(intervaloAtual);
    }
    intervaloAtual = null;
}

renderizarTempo();

function configurarTempoPadrao() {
    pararIntervalo();
    tempoMinutos = 25;
    tempoSegundos = 0;
    configurarTempoAtual();
    renderizarTempo();
}

function configurarPausaCurta() {
    pararIntervalo();
    tempoMinutos = 5;
    tempoSegundos = 0;
    configurarTempoAtual();
    renderizarTempo();
}

function configurarPausaLonga() {
    pararIntervalo();
    tempoMinutos = 15;
    tempoSegundos = 0;
    configurarTempoAtual();
    renderizarTempo();
}

function configurarTempoCustomizado() {
    pararIntervalo();
    tempoMinutos = isNaN(iptMinutos.value) ? 25 : parseInt(iptMinutos.value);
    tempoSegundos = isNaN(iptSegundos.value) ? 0 : parseInt(iptSegundos.value);
    configurarTempoAtual();
    renderizarTempo();
}

function play(){
    if (intervaloAtual != null) {
        return;
    }
    intervaloAtual = setInterval(() => {
        if (tempoAtualSegundos <= 0) {
            pararIntervalo();
        } else {
            tempoAtualSegundos--;
            renderizarTempo();
        }
    }, 1000);
}

function pause(){
    pararIntervalo();
}

function restart(){
    pararIntervalo();
    configurarTempoAtual();
    renderizarTempo();
}

btnPadrao.addEventListener("click", configurarTempoPadrao);
btnPausaCurta.addEventListener("click", configurarPausaCurta);
btnPausaLonga.addEventListener("click", configurarPausaLonga);
btnSalvar.addEventListener("click", configurarTempoCustomizado);
btnPlay.addEventListener("click", play);
btnPause.addEventListener("click", pause);
btnRestart.addEventListener("click", restart);

setInterval(() => {
    if (imgApagado.classList.contains('mostrar-imagem')) {
        imgApagado.classList.remove('mostrar-imagem')
        imgAceso.classList.add('mostrar-imagem')
    } else {
        imgAceso.classList.remove('mostrar-imagem')
        imgApagado.classList.add('mostrar-imagem')
    }
}, 1500);

document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, {});
});