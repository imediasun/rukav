let startTime = performance.now();

let logVisit = function() {
    // Test that we have support
    if (!navigator.sendBeacon) return true;

    // URL to send the data to, e.g.
    let url = 'http://webcode.space/projects/analitic/public/visit/store';

    // Data to send
    let data = new FormData();
    data.append('start', startTime);
    data.append('end', performance.now());
    data.append('url', document.URL);
    data.append('host', window.location.hostname);
    data.append('user_agent', navigator.userAgent);

    // Let's go!
    navigator.sendBeacon(url, data);
};

window.onunload = function analytics(event) {
    if (!navigator.sendBeacon) return;
    logVisit();
};