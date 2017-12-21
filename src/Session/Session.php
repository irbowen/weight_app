<?php declare(strict_types = 1);

/*
 * Shouldn't be relying on the $_SESSION superglobal
 * Also makes testing harder
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
interface Session {
    public function get($key);
    public function containsKey($key);
    public function set($key, $value);
    public function clear();
}
