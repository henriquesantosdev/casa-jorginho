import { FormEvent, useState } from "react";
import { Eye, EyeOff, KeyRound, User } from "lucide-react";
import logo from "/img/logo.svg"

export function AuthLogin() {

    const [showPassword, setShowPassword] = useState('password')

    function handleShowPassword() {
        if (showPassword === 'password') {
            return setShowPassword('text')
        } else {
            return setShowPassword('password')
        }
    }

    function getDataLoginForm(event: FormEvent<HTMLFormElement>) {
        event.preventDefault()

        const data = new FormData(event.currentTarget)
        const cpf = data.get('cpf')?.toString()
        const password = data.get('password')?.toString()

        console.log(cpf, password)
    }
    
    return (
        <div className="bg-loginBackground h-screen flex items-center justify-center p-4">
            <div className="bg-gradient-to-t from-white to-[#EDF5FB] p-6 w-max-4/12 rounded-lg space-y-4 bg-gradientSlim">

                <img src={logo} alt="logo casa jorginho" className="mx-auto"/>

                <div>
                    <h2 className="text-center font-medium text-gray-500 text-xl">
                        Faca login com CPF
                    </h2>
                    <p className="text-center font-medium text-gray-400">
                        Faca login 
                    </p>
                </div>

                <form onSubmit={getDataLoginForm} className="space-y-5">
                    <div className="flex items-center border-[2px] border-gray-200 rounded-xl px-4 gap-2">
                        <User className="size-6 text-gray-400"/>
                        <input
                            type="number"
                            placeholder="Digite seu CPF"
                            className="w-full bg-transparent focus:outline-none size-6 h-14 text-gray-400 placeholder:text-gray-400"
                        />
                    </div>

                    <div className="flex items-center border-[2px] border-gray-200 rounded-xl px-4 gap-2">
                        <KeyRound className="size-6 text-gray-400"/>
                        <input
                            type={showPassword}
                            max="11"
                            min="11"
                            placeholder="Digite sua senha"
                            className="w-full bg-transparent focus:outline-none size-6 h-14 text-gray-400 placeholder:text-gray-400"
                        />
                        <button onClick={() => handleShowPassword()}>
                            {showPassword === 'password'
                            ? <Eye className="size-6 text-gray-400"/>
                            : <EyeOff className="size-6 text-gray-400"/>
                            }
                            
                        </button>
                    </div>

                    <div className="flex">
                        <a href="#" className="mx-auto text-gray-500 hover:underline">Esqueceu a senha?</a>
                    </div>

                    <div>
                        <button className="w-full focus:outline-none size-6 text-white h-14 rounded-xl hover:bg-blue-600 bg-blue-700">
                            Entrar
                        </button>
                    </div>

                    <div className="flex items-center">
                        <span className="mx-auto text-gray-500">
                            Nao possui uma conta? <a href="#" className="text-blue-500 hover:underline">cadastre-se</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    )
}
