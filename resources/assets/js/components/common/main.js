export function uuid(pattern = 'xxxxxx') {
    let timestamp = new Date().getTime();

    return pattern.replace(/[xy]/g, function (chain) {
        let rand_integer = (timestamp + Math.random() * 16) % 16 | 0;
        timestamp = Math.floor(timestamp / 16);
        return (chain === 'x' ? rand_integer : (rand_integer & 0x3 | 0x8)).toString(16);
    });

}