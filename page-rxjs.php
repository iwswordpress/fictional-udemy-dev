<?php get_header(); ?>

  <div class="container mx-auto  bg-gray-300 text-black p-8 " id="rxjs">
          <div>
            <div>
              <h1>Index05 REGISTER</h1>
              <h4 class="text-red-500">Needs express running</h4>
              <p>Had to comment out email-available as not working.</p>
            </div>
          </div>

        </section>
        <section>
          <div>
            <h1>Register and accept terms</h1>
          </div>
          <div id="validation-email" class="validation">&nbsp;</div>
          <div>
            <input type="text" id="email" name="email" size="20" placeholder="Email" />
          </div>
          <div id="validation-password" class="validation">&nbsp;</div>
          <div>
            <input type="text" id="password" name="password" size="20" placeholder="Password" />
          </div>

          <div style="margin-top: 20px">
            <input type="checkbox" id="cbo" name="cbo" value="ticked" />
            <label for="cbo">Please
              tick you are happy to proceed</label>
          </div>
          <div>
            <button id="btnSubmit" disabled class="bg-blue-500 text-white p-2">DISABLED</button>
          </div>
          <div>
            <h2>Output</h2>
          </div>
          <div id="output"></div>
        </section>
        <section>
          <div class="notes">
            <h1>Notes</h1>
            <p>We don't want distinctUntilchanged becasue we want the user to have the ability to revert to a
              previous
              value. It also does not work with combineLatest as they are opposite strategies.</p>
            <p>Email available is a rnd > 0.5 in API for demo purposes.</p>
            <p>Two AJAX requests: <br>email-available <br>email-register</p>
          </div>
        </section>
      
  </div>    


<?php get_footer(); ?>