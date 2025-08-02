function startCountdown() {
    const now = new Date();
    const endOfDay = new Date();
    endOfDay.setHours(23, 59, 59, 999);
    const diff = endOfDay - now;
    if (diff <= 0) {
        $("#day", "#hour", "#minute", "#second").text("0");
        return;
    }
    const totalSeconds = Math.floor(diff / 1000);
    const days = Math.floor(totalSeconds / (3600 * 24));
    const hours = Math.floor((totalSeconds % 86400) / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const seconds = totalSeconds % 60;

    $("#day").text(days);
    $("#hour").text(String(hours).padStart(2, "0"));
    $("#minute").text(String(minutes).padStart(2, "0"));
    $("#second").text(String(seconds).padStart(2, "0"));
}
$(function () {
    startCountdown();
    setInterval(startCountdown, 1000);
});
