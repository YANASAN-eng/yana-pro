// プルダウンElement取得
let pullDown = document.getElementById('pull-down');
// サイドメニュー
let menu = document.getElementById('menu');

let pullDownFlag = false;
/**
 * プルダウン動作
 */
pullDown.addEventListener('click', function(){
    if (!pullDownFlag) {
        pullDown.innerText = "▲";
        pullDownFlag = true;
        fadeIn(menu, 1000);
    } else {
        pullDown.innerText = "▼";
        pullDownFlag = false;
        fadeOut(menu, 1000);
    }
});

/**
 * メニューをフェードアウトさせる処理
 * 
 */
function fadeOut(element, duration){
    const startTime = Date.now();

    function step(){
        const elapsed = Date.now() - startTime;
        const opacity = Math.max(1 - elapsed / duration, 0);
        element.style.opacity = opacity;

        if (opacity <= 1) {
            requestAnimationFrame(step);
        } else {
            element.style.display = 'none';
        }
    }
    step();
}

/**
 * メニューをフェードインさせる処理
 * 
 */
function fadeIn(element, duration){
    element.style.display = 'block';
    const startTime = Date.now();

    function step(){
        const elapsed = Date.now() - startTime;
        const opacity = Math.min(elapsed / duration, 1);
        element.style.opacity = opacity;

        if (opacity <= 1) {
            requestAnimationFrame(step);
        }
    }
    step();
}