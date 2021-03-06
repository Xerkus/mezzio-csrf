<?php

/**
 * @see       https://github.com/mezzio/mezzio-csrf for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-csrf/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-csrf/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Mezzio\Csrf;

interface CsrfGuardInterface
{
    /**
     * Generate a CSRF token.
     *
     * Typically, implementations should generate a one-time CSRF token,
     * store it within the session, and return it so that developers may
     * then inject it in a form, a response header, etc.
     *
     * CSRF tokens should EXPIRE after the first hop.
     */
    public function generateToken(string $keyName = '__csrf') : string;

    /**
     * Validate whether a submitted CSRF token is the same as the one stored in
     * the session.
     *
     * CSRF tokens should EXPIRE after the first hop.
     */
    public function validateToken(string $token, string $csrfKey = '__csrf') : bool;
}
