<div id="application-form" style="text-align: center;">
    <div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:24px;margin-top:-10px;">Gamemaster Application Form</div>
    <form>
        <div class="answer-line">
            <div class="important-question">1.Please write your full name in order for your application to be validated!</div>
            <div class="question-description">-Please write your real name , no account name , no nicknames nothing else but your name.</div>
            <input class="answer-low" name="answ-1" type="text" size="100" required />
        </div>
        <div class="answer-line">
            <div class="important-question">2.How old are you ? Please make sure you have read the rules before answering to this form!</div>
            <div class="question-description">-Make sure you have read the rules , the minimum age we accept is 17 years old.</div>
            <input class="answer-low" name="answ-2"  type="text" size="100" required />
        </div>
        <div class="answer-line">
            <div class="important-question">3.Do you have skype? And are you wiling to chat into a group?</div>
            <div class="question-description">-We are using skype as chat with every staff member.</div>
            <input class="answer-low" name="answ-2"  type="text" size="100" required />
        </div>

        <div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:15px;font-size:24px;margin-top:-10px;">Questionaire</div>

        <div class="answer-line">
            <div class="important-question">1.A player is having the following problem, how do you answer to him?</div>
            <div class="question-description">-"My chaaracter is bugged I can't see icons and I can't use my skills , I also see everything in blue/white squares"</div>
            <textarea class="answer-big" name="answ-2"  maxlength="300" required />
        </div>
        <div class="answer-line">
            <div class="important-question">2.In case of bugged creatures or gameobjects how do you act in the following situation?</div>
            <div class="question-description">-"For example Poseidon is getting into evade bug what do you do , please state at least 2 situations"</div>
            <textarea class="answer-big" name="answ-2"  maxlength="300" required />
        </div>
        <div class="answer-line">
            <div class="important-question">3.As gm sometimes there will be a flood of tickets and sometimes there won't be any tickets how do you act in the following situation?</div>
            <div class="question-description">-"There are 3 active tickets and there is another staff member online but AFK"</div>
            <textarea class="answer-big" name="answ-2"  maxlength="300" required />
        </div>
        <div class="answer-line">
            <div class="important-question">4.We allow staff members to dual box but many things happen when you are playing on your main account.</div>
            <div class="question-description">-"You are not allowed to stay afk for more than 10 minutes on your GM account but also there might be some hackers while you are playing on your main what do you do in this situation?"</div>
            <textarea class="answer-big" name="answ-2"  maxlength="300" required />
        </div>
        <div class="answer-line">
            <div class="important-question">5.We are looking for inventive staff members wo can help us with ideeas and a way to apply them.</div>
            <div class="question-description">-"What could you help us with more than being a staff member , runing events and reading tickets ? Please write a groud breaking ideea."</div>
            <textarea class="answer-big" name="answ-2"  maxlength="300" required />
        </div>
        <div class="answer-line">
            <div class="disclaimer">
                <div class="line">-You must be at least 17 years old in order to be able to validate your application.</div>
                <div class="line">-You must have joined at least 1 month before applying and know the basics of the server.</div>
                <div class="line">-Please answer to all questions as explicit as possible.</div>
                <div class="line" style="margin-top:20px;"><input type="checkbox" required /><label>I agree with the following rules</label></div>
            </div>
            <input value='<?php echo $user_account->acc_id; ?>' name='com-autor' type='hidden' >
            <input value='Submit Application' name='send-comm' id='post-apply' type='submit' >
        </div>
    </form>
</div>