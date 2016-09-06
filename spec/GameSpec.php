<?php

 describe('A bowling game scoring system', function() {

   beforeEach(function() {
     $this->game = new BowlingKata\Game();

     $this->rollMany = function($n, $pins) {
       for ($i = 0; $i < $n; $i++) {
           $this->game->roll($pins);
       }
     };

     $this->rollStrike = function() {
       $this->game->roll(10);
     };
   });

   it ('Should roll gutter game (the worst game ever :( )', function() {
     $this->rollMany(20, 0);
     expect(0)->toBe($this->game->score());
   });

   it('Should roll all ones', function() {
     $this->rollMany(20, 1);
     expect(20)->toBe($this->game->score());
   });

   it('Should roll one spare', function() {
     $this->game->rollSpare();
     $this->game->roll(3);
     $this->rollMany(17, 0);
     expect(16)->toBe($this->game->score());
   });

   it('Should roll one strike', function() {
     $this->rollStrike();
     $this->game->roll(3);
     $this->game->roll(4);
     $this->rollMany(16, 0);
     expect(24)->toBe($this->game->score());
   });

   it('Should roll a perfect game', function() {
     $this->rollMany(12, 10);
     expect(300)->toBe($this->game->score());
   });
 });
