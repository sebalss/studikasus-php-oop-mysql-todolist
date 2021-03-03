<?php

namespace Service{

    use Entity\Todolist;
    use Repository\TodolistRepository;

    interface TodolistService{

    function showTodolist(): void;

    function addTodolist(string $todo): void;

    function removeTodolist(int $number): void;

    }

    class TodolistServiceImpl implements TodolistService{
        private TodolistRepository $todolistRepository;

        public function __construct(TodolistRepository $todolistRepository)
        {
            $this->todolistRepository = $todolistRepository;
        }

        public function showTodolist(): void
        {
            echo "TODOLIST". PHP_EOL;
            $todolist = $this->todolistRepository->findAll();
            foreach ($todolist as $number => $value){
                echo $value->getId() . ". ". $value->getTodo() . PHP_EOL;
            }
        }

        public function addTodolist(string $todo): void
        {
            $todolist = new Todolist($todo);
            $this->todolistRepository->save($todolist);
            echo "Sukses menambahkan Todolist" . PHP_EOL;
        }

        public function removeTodolist(int $number): void
        {
            if ($this->todolistRepository->remove($number)){
                echo "Todo berhasil dihapus" . PHP_EOL;
            }else{
                echo "Todo Gagal dihapus" . PHP_EOL;
            }
        }
    }

}
