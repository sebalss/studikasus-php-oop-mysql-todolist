<?php

namespace View{

    use Service\TodolistService;
    use Helper\InputHelper;

    class TodolistView{

        private TodolistService $todolistService;

        public function __construct(TodolistService $todolistService)
        {
            $this->todolistService = $todolistService;
        }


        function showTodoList(): void{
            while(true){
                $this->todolistService->showTodolist();

                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;

                $pilihan = InputHelper::input("Pilih");

                if ($pilihan == "1"){
                    $this->addTodolist();
                }elseif ($pilihan == "2"){
                    $this->removeTodolist();
                }elseif ($pilihan == "x"){
                    break;
                }else{
                    echo "Menu Tidak Tersedia" .PHP_EOL;
                }

            }

            echo "Good Bye";
        }

        function addTodoList(): void{
            echo "MENAMBAH TODO" . PHP_EOL;

            $todo = InputHelper::input("Todo (x untuk batal) ");

            if ($todo == "x"){
                echo "Batal Menambahkan Todo" . PHP_EOL;
            }else{
                $this->todolistService->addTodolist($todo);
            }
        }

        function removeTodoList(): void{
            echo "MENGHAPUS TODO" . PHP_EOL;

            $pilihan = InputHelper::input("Nomor (x untuk batal)");

            if ($pilihan == "x") {
                echo "Batal Menghapus Todo" . PHP_EOL;
            }else{
                $this->todolistService->removeTodoList($pilihan);
            }
        }
    }
}