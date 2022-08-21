import { App } from './App.js';

let a = () => {
    console.log(123);
}

let b = <App />;

console.log(b, a);