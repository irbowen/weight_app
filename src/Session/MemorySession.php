<?php declare(strict_types=1);

require_once('../src/common/Session.php');

/*
 * Shouldn't be relying on the $_SESSION superglobal
 * Also makes testing harder
 * 
 * @author Isaac Bowen bowen.isaac@gmail.com
 */
class MemorySession implements Session {

    private $session = array();

    public function get($key) {
        return array_key_exists($key, $this->session) ? $this->session[$key] : null;
    }

    public function containsKey($key): bool {
        return array_key_exists($key, $this->session);
    }

    public function set($key, $value) {
        $this->session[$key] = $value;
    }

    public function clear() {
        // TODO
    }
}