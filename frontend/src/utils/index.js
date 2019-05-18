export default {
    getKeyCode(event) {
        if (event.key !== undefined) {
            return event.key;
        } else if (event.keyCode !== undefined) {
            return event.keyCode;
        }

        return null;
    }
};