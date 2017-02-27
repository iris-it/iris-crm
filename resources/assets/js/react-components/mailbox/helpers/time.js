const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

export function getPrettyDate(date) {
    date = date.split(' ')[0];
    const newDate = date.split('-');
    const month = months[0];
    return `${month} ${newDate[2]}, ${newDate[0]}`;
}

// Remove the seconds from the time
export function getPrettyTime(date) {
    const time = date.split(' ')[1].split(':');
    return `${time[0]}:${time[1]}`;
}